@extends('layouts.app')

@section('content')


        

<div class="container">
        
        <form class="text-center" action="#!" method="POST">
        @csrf

            <div class="md-form">
                <input type="text" id="form1" class="form-control">
                <label for="form1">Search</label>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <select class="browser-default custom-select">
                    <option value="" disabled selected>Select Location</option>
                    <option value="1">Dhaka</option>
                    <option value="2">Sylhet</option>
                    <option value="3">Chittagong</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="browser-default custom-select">
                    <option value="" disabled selected>Select Budget</option>
                    <option value="1">>5000</option>
                    <option value="2">>10000</option>
                    <option value="3">>15000</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="card mt-4">
            <h5 class="card-header h5 py-4">Jobs Available</h5>
            <div class="card-body">
                <div class="row justify-content-center">

                    <div class="col">
                        @if (count($jobs_available) > 0)
                        @foreach ($jobs_available as $job)

                        <div class="card mb-3">
                        <p class="card-header">Title: {{$job->job_title}}</p>
                            <div class="card-body">
                                <p class="card-text">Budget: Taka {{$job->job_budget}}</p>
                                <p class="card-text">Description: {{$job->job_description}}</p>
                                <a href="{{route('freelancer.showjob', $job->job_id)}}" class="btn btn-dark">View Details</a>
                            </div>
                        </div>
                        @endforeach

                        {{ $jobs_available->links() }}
                        @endif

                    </div>

                </div>
            </div>
        </div>

</div>

@endsection
