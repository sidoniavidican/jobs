@extends('layouts.app')

@section('content')



<div class="container">
    <div>
    <search></search>
    </div>
        @include('partials.filters')  
        <div class="row table">
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
</div>

</div>
@endsection
