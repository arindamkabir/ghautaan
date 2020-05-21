@extends('layouts.app')

@section('content')


        

<div class="container">
        <form class="text-center container" action="{{route('search')}}" method="POST">
        @csrf
                <div class="md-form input-group ">   
                <input type="text" id="form1" class="form-control" placeholder="Search" name="search">
                <div class="input-group-append">
                    <button class="btn btn-md btn-dark m-0 px-3 py-2 z-depth-0 waves-effect" type="submit">Search</button>
                </div>
                </div>
        </form>
        <div class="row">
            <div class="col-md-3 mt-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <p class="text-muted">Category</p>
                        <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="category" checked>
                        <label class="custom-control-label" for="defaultGroupExample1">All</label>
                        </div>
                        <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="category" >
                        <label class="custom-control-label" for="defaultGroupExample2">Photography</label>
                        </div>
                        <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="category">
                        <label class="custom-control-label" for="defaultGroupExample3">Make-up</label>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <p class="text-muted">Budget</p>
                       
                        <select class="browser-default custom-select">
                        <option value="" disabled selected>Budget</option>
                        <option value="1">>5000</option>
                        <option value="2">>10000</option>
                        <option value="3">>15000</option>
                        </select>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <p class="text-muted">Location</p>

                        <select class="browser-default custom-select">
                        <option value="" disabled selected>Location</option>
                        <option value="1">Dhaka</option>
                        <option value="2">Sylhet</option>
                        <option value="3">Chittagong</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                

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
                                        <a href="{{route('freelancer.showjob', $job->job_id)}}" class="btn btn-md btn-dark">View Details</a>
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
        </div>        
</div>

@endsection
