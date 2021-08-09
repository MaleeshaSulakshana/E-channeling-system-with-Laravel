@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Basic info</h2>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('patient.update-profile', ['user' => $user->id]) }}">
                <input type="hidden" name="_method" value="PUT">

                @csrf
                @method('PATCH')
             
                <div class="row">

                    <div class="col-md-6">
                       
                    </div>
                    <div class="col-md-6">
                         <div class="form-group" style="float: right;">
                             <div class="avatar-wrapper">
                                @if($user->image)
                                    <img src="{{ url('/assets/attachments/users') }}/{{ $user->image }}" id="image" class="img-fluid rounded" style=" max-width:100px; max-height: 100px;">
                                    <div class="camera-overlay text-center">
                                        <i class="icon-camera"></i>
                                    </div>
                                @else
                                    <img src="{{ asset('/assets/img/avatar.jpg') }}" class="img-fluid rounded" style=" max-width:100px; max-height: 100px;">
                                @endif
                             </div>
                             @error('image')
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
                            <label>First Name</label>
                            <input type="text" placeholder="Enter your first name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

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
                            <input type="text" placeholder="Enter your last name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

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
                            <select type="gender" placeholder="Select your geneder" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ $user->gender }}" required autocomplete="gender" autofocus>
                                <option selected disabled>Select your gender</option>
                                <option value="male" {{($user->gender === 'male') ? 'Selected' : ''}}>Male</option>
                                <option value="female" {{($user->gender === 'female') ? 'Selected' : ''}}>Female</option>
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
                            <input type="date" placeholder="Enter your birthday" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $user->date_of_birth }}" required autocomplete="date_of_birth" autofocus>

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
                            <input type="text" placeholder="07x xxx xxxx" id="mobileNo" class="form-control @error('mobileNo') is-invalid @enderror" name="mobileNo" value="{{ $user->mobileNo }}" required autocomplete="mobileNo" autofocus>

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
                            <input type="string" placeholder="Enter your address" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>

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
                            <input type="email" placeholder="Enter your email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                </div>
               <input type="hidden" value="{{ $user->image }}" name="old_image" />
               <input type="file" class="d-none @error('image') is-invalid @enderror" name="image" id="imagefile" />
              
                <button type=submit" class="btn_1 medium">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection

@section('css')
    <style>
        .camera-overlay {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            font-size: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00000000;
            color: transparent;
            cursor: pointer;
            transition: background-color 0.5s ease;
            transition: color 0.5s ease;
        }

        .camera-overlay:hover {
            background-color: #00000094;
            color: white;
        }

        .avatar-wrapper {
            position: relative;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
@endsection

@section('js')
<script>
    $('.camera-overlay').on('click', function() {
        $('#imagefile').click();
    })

    $("#imagefile").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection


