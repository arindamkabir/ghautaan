@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row my-5">

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    
                    <div class="text-center profile-picture-div">
                        <div class="text-center profile-picture-div">
                            @if($data->pro_pic_name != null)
                                <img src="{{asset($data->pro_pic_path)}}" class="profile-picture" alt="..." width="150px">
                            @else
                                <img src="https://api.adorable.io/avatars/150/abott@adorable.png" class="profile-picture" alt="..." >
                            @endif
                        </div>
                    </div>
                    <h5 class="text-center mt-4">{{$data->f_name}} {{$data->l_name}}</h5>
                    <h6 class="text-center mt-1">Photographer</h6>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-9 container">
            <div class="row ml-3">
                <div class="ml-auto">
                    <a href="{{ route('editprofile',Auth::user()->username)}}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>

            <div class="card my-3" >
                <div class="card-body">
                    <h2 class="pro-subheading mb-3">General Information</h2>
                    <div class="row">
                        
                        <div class="col-sm-3 profile-about-details-left">
                            <p>Name</p>
                            <p>Username</p>
                            <p>Password</p>
                            <p>Profession</p>
                            <p>Date of Birth</p>
                        </div>
                        <div class="col-sm profile-about-details-right">
                            <p>{{$data->f_name}} {{$data->l_name}}</p>
                            <p>{{$data->username}}</p>
                            <p>*******</p>
                            <p>{{$data->profession}}</p>
                            <p>{{$data->dob}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" >
                <div class="card-body">
                <h2 class="pro-subheading mb-3">Contact Information</h2>
                    <div class="row">
                
                        <div class="col-sm-3 profile-about-details-left">
                            <p>Email</p>
                            <p>Contact</p>
                            <p>Address</p>
                        </div>
                        <div class="col-sm profile-about-details-right">
                            <p>{{$data->email}}</p>
                            <p>{{$data->mobile_number}}</p>
                            <p>{{$data->address}}, {{$data->city}}, {{$data->state}}-{{$data->zip}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" >
                <div class="card-body">
                    <h2 class="pro-subheading mb-3">About Me</h2>
                    <p>{{$data->about}}</p>
                </div>
            </div>
            <div class="card mb-3" >
                <div class="card-body">
                    <h2 class="pro-subheading">Portfolio Gallery</h2>
                    <p>You can add pictures to your portofolio!</p>
                </div>
            </div>
        </div>

    </div>

</div>



@endsection