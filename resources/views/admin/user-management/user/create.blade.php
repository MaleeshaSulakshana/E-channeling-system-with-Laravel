@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
     
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Create User</li>
        </ol>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Basic info</h2>
            </div>
            
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.user.store') }}">
                @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" placeholder="Enter your first name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" placeholder="Enter your last name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select type="gender" placeholder="Select your geneder" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                            <option selected disabled>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input type="date" placeholder="Enter your birthday" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror


                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile number</label>
                        <input type="text" placeholder="07x xxx xxxx" id="mobileNo" class="form-control @error('mobileNo') is-invalid @enderror" name="mobileNo" value="{{ old('mobileNo') }}" required autocomplete="mobileNo" autofocus>

                        @error('mobileNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" placeholder="Address" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Enter your email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter your password" id="password" class="form-control @error('email') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>User type</label>
                        <select type="string" placeholder="Select user role" id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}" required autocomplete="role_id" autofocus>
                            <option selected disabled>Select user type</option>
                            <option value="1">Admin</option>
                            <option value="2">Patient</option>
                            <option value="3">Doctor</option>
                        </select>

                        @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Profile picture</label>
                        <input type="file" placeholder="Enter your password" id="image" class="form-control  @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
            </div>
            <button type=submit" class="btn_1 medium">Save</button>

        </form>

        </div>     
    </div>
</div>

@endsection

