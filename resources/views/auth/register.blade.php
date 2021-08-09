@extends('layouts.auth')

@section('content')

    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="register">
                <h1>Please register to Findoctor!</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('register-user') }}">
                            @csrf
                            <div class="box_form">
                            
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" placeholder="Enter your first name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" placeholder="Enter your last name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Enter your email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

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

                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="date" placeholder="Enter your birthday" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label>Mobile number</label>
                                    <input type="text" placeholder="07x xxx xxxx" id="mobileNo" class="form-control @error('mobileNo') is-invalid @enderror" name="mobileNo" value="{{ old('mobileNo') }}" required autocomplete="mobileNo" autofocus>

                                    @error('mobileNo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Enter your address" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>


                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" placeholder="Enter your password" id="password" class="form-control @error('email') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                {{-- <div class="form-group">
                                    <label> Confirm Password</label>
                                    <input type="password" placeholder="Enter your password" id=" password-confirm"" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password" autofocus>

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div> --}}


                                <div class="form-group">
                                    <label>Profile image</label>
                                    <input type="file" placeholder="Enter your password" id="image" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div id="pass-info" class="clearfix"></div>
                                <div class="checkbox-holder text-left">
                                    <div class="checkbox_2">
                                        <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked>
                                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                                    </div>
                                </div>
                                <div class="form-group text-center add_top_30">
                                    <button class="btn_1 medium" type="submit">Register with Findoctor</button>
                                </div>
                            </div>
                            <p class="text-center link_bright">Already a member? <a href="{{ route('login') }}"><strong>Login</strong></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
