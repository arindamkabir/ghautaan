@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="page-heading">Edit Profile</h2>

    <div class="row my-5">
        <div class="col-md-3">
            <nav class="nav flex-column free_edit_sidebar">        
                <a class="nav-link" href="{{ route('profile.edit',Auth::user()->username)}}">General Information</a>
                <a class="nav-link active" href="{{route('profile.password.edit',Auth::user()->username)}}">Change Password</a>
                <a class="nav-link" href="#">Portfolio</a>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Old Password</label>
                            <input type="password" class="form-control" id="formGroupExampleInput" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">New Password</label>
                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="********">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Confirm New Password</label>
                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="********">
                        </div>
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </form>

                </div>
            </div>
        </div>


</div>



@endsection