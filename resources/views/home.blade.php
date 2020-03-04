@extends('layouts.app')

@section('content')
<div class="container">
    <img src="/img/job.jpg" style="object-fit: cover;width:100%"> <img>

    <div class="form-group d-flex justify-content-center text-center">
        Get new jobs for selected category and city by email
    </div>
    <div class="form-group d-flex justify-content-center">
        <select class="form-group selectpicker" name="category_id" id="category_id" title="Category"> 
            @foreach($categories as $category)
            <option value="{{$category->id}}"> {{$category->name}}</option>
            @endforeach
        </select> 
        
        <select class="form-group selectpicker" name="city_id" id="city_id" data-live-search="true" title="City"> 
            @foreach($cities as $city)
            <option value="{{$city->id}}"> {{$city->name}}</option>
            @endforeach
        </select> 
    </div>
    <div class="form-group d-flex justify-content-center">
        <a class="btn btn-info notify-user">Send me jobs</a>
    </div>
    <div class="form-group d-flex justify-content-center text-center">
        By creating a job alert or receiving recommended jobs, you agree to our Terms. 
        You can change your consent settings at any time by unsubscribing or as detailed in our terms.
    </div>

    <div class="d-flex justify-content-center text-center">
        <h3>Let employers find you </h3>
    </div>
    <div class="d-flex justify-content-center upload">
        @guest
            <button class="btn btn-info dropzone-disabled" type="button">Upload your CV</button>
        @else
        <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data" class="dropzone">
            @csrf
            <div class="dz-message btn btn-info" data-dz-message><span> Upload your CV</span></div>
        </form>
        @endguest
   
    </div>
    <div class="row">
        @foreach($jobs as $job) 
        <div class="col-sm-6 col-md-4 gallery">
            <div class="inner-content">
                <a href= > <img class="img-responsive" src="/img/images.jpg"/></a> 
            </div>
            <div class="inner-content-text">
                <h4><a href=>{{$job->title}}</a></h4>
                <h5>{{$job->user->name}}</h5>
                <h5><i class="fas fa-map-marker-alt"></i>{{$job->city->name}}</span></h5>
                @guest
                    <button class="btn btn-info dropzone-disabled" type="button" value="{{$job->id}}">Apply</button>
                @else
                    @if(!Auth::user()->hasApplication($job))
                        <button class="btn btn-info apply" type="button" value="{{$job->id}}">Apply</button>
                    @else 
                        <button class="btn btn-info apply" type="button" disabled>Applied</button>
                    @endif
                @endguest
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
