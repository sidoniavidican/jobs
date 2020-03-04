@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <form action="{{route('jobs.update', $job->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <label> City</label>
                <select class="form-control" name="city_id"> 
                    @foreach($cities as $city) 
                        <option value="{{$city->id}}" @if($job->city_id == $city->id) selected @endif> {{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label> Category</label>
                <select class="form-control" name="category_id"> 
                    @foreach($categories as $category) 
                        <option value="{{$category->id}}" @if($job->category_id == $category->id) selected @endif> {{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label> Min salary</label>
                <input class="form-control" min="1" type="number" name="min" value="{{$job->min}}"> 
            </div>
            <div class="col">
                <label> Max salary</label>
                <input class="form-control" min="1" type="number" name="max" value="{{$job->max}}"> 
            </div>
        </div>
        <div class="form-group">
            <label> Title</label>
            <input class="form-control" type="text" name="title" value="{{$job->title}}"> 
        </div>
        <div class="form-group">
            <label> Description</label>
            <textarea class="form-control" name="description"> {{$job->description}} </textarea> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"> Edit job </button> 
        </div>
    </form>
</div>
@endsection
