@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="page-heading">Edit Profile</h2>

    <div class="row my-5">
        <div class="col-md-3">
            <nav class="nav flex-column free_edit_sidebar">        
                <a class="nav-link active " href="{{ route('profile.edit',Auth::user()->username)}}">General Information</a>
                <a class="nav-link " href="{{route('profile.password.edit',Auth::user()->username)}}">Change Password</a>
                <a class="nav-link" href="#">Portfolio</a>
            </nav>
        </div>
        <div class="col-md-9 container">
            <div class="d-flex flex-row align-items-center mb-5">
                <div class="text-center profile-picture-div">
                    @if($data->pro_pic_name != null)
                        <img src="{{asset($data->pro_pic_path)}}" class="profile-picture" alt="..." width="150px">
                    @else
                        <img src="https://api.adorable.io/avatars/150/abott@adorable.png" class="profile-picture" alt="..." >
                    @endif
                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-primary ml-4" data-toggle="modal" data-target="#exampleModal">Upload New Picture</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('profile.pro_pic.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                        
                                        <div class="col-md-6">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                        
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success">Upload</button>
                                        </div>
                        
                                    </div>
                                </form>                    
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <form action="{{ route('profile.pro_pic.delete') }}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            <form action="{{ route('profile.update', Auth::user()->username) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="">First name</label>
                        <input type="text" class="form-control" placeholder="First name" value="{{$data->f_name}}" name="f_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Last name</label>
                        <input type="text" class="form-control" placeholder="Last name" value="{{$data->l_name}}" name="l_name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="{{$data->username}}" name="username" required>   
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="Email" value="{{$data->email}}" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" placeholder="Contact" value="{{$data->mobile_number}}" name="contact" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mb-3">
                    <label for="validationDefault03">Street Address</label>
                    <input type="text" class="form-control" id="" placeholder="City" value="{{$data->address}}" name="address" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationDefault03">City</label>
                    <input type="text" class="form-control" id="validationDefault03" placeholder="City" value="{{$data->city}}" name="city" required>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationDefault04">State</label>
                    <input type="text" class="form-control" id="validationDefault04" placeholder="State" value="{{$data->state}}" name="state" required>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationDefault05">Zip</label>
                    <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" value="{{$data->zip}}" name="zip" required>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
        </div>
            

    </div>

</div>



@endsection