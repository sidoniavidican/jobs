<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\City;
use App\Category;
use App\Notification;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::all();
        return view('home', compact('jobs'));
    }

    public function notify(Request $request)
    {
        if(Auth::check()) {
            $user = Auth::user();
            $notification = $request->all();
            if(!$user->hasNotification($notification['category_id'], $notification['city_id'])) {
                $notification['user_id'] = $user['id'];
                Notification::create($notification);
                $type = 'success';
                $message = 'You will receive email notification';
            } else {
                $type = 'success';
                $message = 'You already applied to get notifications for this category and city';
            }
        } else {
            $type = 'danger';
            $message = 'You need to be loged in';
        }
        return response()->json([
            'type' => $type,
            'message' => $message
        ]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $jobs = Job::where('status', 1);
        if($request->has('city') && $request->input('city')!='') { 
            $city = City::where('name', $request->input('city'))->firstOrFail();
            $jobs->where('city_id', $city->id);
        };
        if($request->has('what')) { 
            $jobs->where('title', 'like', '%'.$request->input('what').'%');
        };
        $jobs = $jobs->get();
        return view('search', compact('jobs'));
    }

    public function advance(Request $request)
    {
        $jobs = Job::where('title', 'like', '%'.$request->keywords.'%')->get();
        return response()->json($jobs);
    }
}
