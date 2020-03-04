@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ route('jobs.create') }}" class="btn btn-primary"> <i class="fas fa-user-plus"></i></a>
    <table class="table"> 
        <thead>
            <td>Title</td>
            <td>Applications</td>
            <td>Status</td>
            <td>Created</td>
            <td>Action</td>
        </thead>
        <tbody>
        @foreach($jobs as $job) 
            <tr>
                <td> {{$job->title}} </td>
                <td> {{count($job->applications)}} </td>
                <td> {{$job->status}} </td>
                <td> {{$job->created_at}} </td>
                <td>
                    <form action="{{ route('jobs.destroy', $job->id)}}" method="post">
                        <a href="{{ route('jobs.show', $job->id)}}" class="btn btn-info"><i class="fas fa-list"></i></a>
                        <a href="{{ route('jobs.edit', $job->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
