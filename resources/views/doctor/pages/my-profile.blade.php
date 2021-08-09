@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('doctor.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>My info</h2>
            </div>

                <div class="row">

                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="float: right;">
                            <div class="avatar-wrapper">
                                <img src="{{ url('/assets/attachments/users') }}/{{ $user->image }}" id="image" class="img-fluid rounded" style=" max-width:100px; max-height: 100px;">
                                <div class="camera-overlay text-center">
                                    <i class="icon-camera"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your first name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" placeholder="Enter your last name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select type="gender" placeholder="Select your geneder" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus disabled>
                                <option value="male" {{($user->gender === 'male') ? 'Selected' : ''}}>Male</option>
                                <option value="female" {{($user->gender === 'female') ? 'Selected' : ''}}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of birth</label>
                            <input type="" placeholder="Enter your birthday" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $user->date_of_birth }}" required autocomplete="date_of_birth" autofocus disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile number</label>
                            <input type="text" placeholder="07x xxx xxxx" id="mobileNo" class="form-control @error('mobileNo') is-invalid @enderror" name="mobileNo" value="{{ $user->mobileNo }}" required autocomplete="mobileNo" autofocus disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="string" placeholder="Enter your address" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Enter your email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" autofocus disabled>
                        </div>
                    </div>
                </div>   
        </div>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Career info</h2>
            </div>
         
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control"value=" {{ $doctor->doctorName }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Specialization</label>
                        <input class="form-control" value="{{ $department }}" disabled>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Registration number</label>
                        <input class="form-control" value="{{ $doctor->registrationNo }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Qualification</label>
                        <input class="form-control" value="{{ $doctor->educationalDegrees }}" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>On</label>
                        <input class="form-control"  value="{{ $doctor->isAvaliableOn }}" required autocomplete="mobileNo" autofocus disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>From</label>
                        <input class="form-control" value="{{ $doctor->isAvaliableFrom }}" disabled>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

