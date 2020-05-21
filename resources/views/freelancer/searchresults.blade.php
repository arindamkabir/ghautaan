@extends('layouts.app')

@section('content')

<div class="container">

    <h5 class="heading text-center py-4">Number of results found : {{$number_results}}</h5>
    <div class="card mt-4">
                    <div class="card-body">
                        <div class="row justify-content-center">

                            <div class="col">
                                @foreach ($results as $job)

                                <div class="card mb-3">
                                <p class="card-header">Title: {{$job->job_title}}</p>
                                    <div class="card-body">
                                        <p class="card-text">Budget: Taka {{$job->job_budget}}</p>
                                        <p class="card-text">Description: {{$job->job_description}}</p>
                                        <a href="{{route('freelancer.showjob', $job->job_id)}}" class="btn btn-md btn-dark">View Details</a>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
    </div>

</div>

@endsection