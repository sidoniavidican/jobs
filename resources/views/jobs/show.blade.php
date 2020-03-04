@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <table class="table"> 
        <thead>
            <td>User</td>
            <td>Email</td>
            <td>Created</td>
            <td>Cv</td>
        </thead>
        <tbody>
        @foreach($job->applications as $application) 
            <tr> 
                <td> {{$application->name}} </td>
                <td> {{$application->email}} </td>
                <td> {{$application->created_at}} </td>
                <td>       
                    <a href="{{ route('download', $application->id)}}" class="btn btn-info">
                        <i class="fas fa-file-download"> </i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
