@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
    <h5 class="card-header">{{$job->job_title}}</h5>
    <div class="card-body">
                <h5 class="card-title">Job Details: </h5>
                <p class="card-text">Job Category: {{$job->job_category}}</p>
                <p class="card-text">Job Budget: Taka {{$job->job_budget}}</p>
                <p class="card-text">Job Date: {{$job->job_date}}</p>
                <p class="card-text">Job Address: {{$job->job_address}}</p>
                <p class="card-text">Job Description: {{$job->job_description}}</p>
    @if(!$applied)
    <form method="POST" action="{{route('freelancer.applyjob', $job->job_id)}}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id" value="{{$job->job_id}}">
        <button class="btn btn-primary">Apply For This Job</button> 
    </form>
    @endif
    @if($applied)
    <form method="POST" action="{{route('freelancer.canceljobapp', $job->job_id)}}" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
        <input type="hidden" name="id" value="{{$job->job_id}}">
        <button class="btn btn-danger">Cancel Application</button> 
    </form>
    @endif
    </div>

    </div>

</div>


@endsection