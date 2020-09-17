@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-body">

                <div class="card">
                    <div class="card-body">
                        <div class="text-left profile-picture-div">
                            @if($freelancer->pro_pic_name != null)
                                <img src="{{asset($freelancer->pro_pic_path)}}" class="profile-picture" alt="..." width="150px">
                            @else
                                <img src="https://api.adorable.io/avatars/150/abott@adorable.png" class="profile-picture" alt="..." >
                            @endif
                        </div>
                        <h2>{{$freelancer->f_name}} {{$freelancer->l_name}}</h2>
                        <form action="{{route('employer.acceptapp')}}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                            <input type="hidden" name="free_id" value="{{$freelancer->free_id}}">
                            <button type="submit" class="btn btn-success btn-sm m-0 waves-effect">Accept Application</button>
                        </form>

                        <form action="{{route('employer.rejectapp')}}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                            <input type="hidden" name="free_id" value="{{$freelancer->free_id}}">
                            <button type="submit" class="btn btn-success btn-sm m-0 waves-effect">Reject Application</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
