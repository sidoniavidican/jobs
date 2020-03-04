<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Auth;
use App\Job;
use Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $job = Job::findOrFail($request->job_id);
            $user = Auth::user();
            if($user->hasCv()) {
                $job->applications()->attach($user);
                $type = 'success';
                $message = 'You applied successfully';
            } else {
                $type = 'warning';
                $message = 'You need to upload a CV first';
            }
        } else {
            $type =  'danger';
            $message = 'You need to be loged in';
        }
        return response()->json([
            'type' => $type,
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    public function download($user)
    {
        //$cv = public_path(). '/cv/daniel.docx';
        // return response()->download($cv);
        $cv = Storage::files('cv/'.$user);
        return Storage::download($cv[0]);
     
    }

    public function upload(Request $request)
    {
        $request->file('file')->storeAs('cv/'.$request->user()->id, $request->user()->name.'.docx');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
