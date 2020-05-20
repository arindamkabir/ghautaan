@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            
            <div class="card-body">
            
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('employer.acceptapp')}}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                            <input type="hidden" name="free_id" value="{{$job->free_id}}">
                            <button type="submit" class="btn btn-success btn-sm m-0 waves-effect">Accept Application</button>
                        </form>
                        
                        <form action="{{route('employer.rejectapp')}}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                            <input type="hidden" name="free_id" value="{{$job->free_id}}">
                            <button type="submit" class="btn btn-success btn-sm m-0 waves-effect">Reject Application</button>
                        </form>   
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection