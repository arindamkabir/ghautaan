@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
    <h5 class="card-header">{{$job->job_title}}</h5>
    <div class="card-body">
    @if($job->job_status == "unassigned")
    <form method="POST" action="{{route('freelancer.applyjob', $job->job_id)}}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id" value="{{$job->job_id}}">
        <button class="btn btn-primary">Apply For This Job</button> 
    </form>
    @endif
    @if($job->job_status == "pending")
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