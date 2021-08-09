@extends('layouts.auth')

@section('content')
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login">
                <h1>Please login to Findoctor!</h1>
                <div class="box_form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        
                        {{-- <a href="{{ route('password.request') }}"><small>Forgot password?</small></a> --}}
                        <div class="form-group text-center add_top_20">
                            <button class="btn_1 medium" type="submit">Login to Findoctor</button>
                        </div>
                    </form>
                </div>
                <p class="text-center link_bright">Do not have an account yet? <a href="{{ route('register') }}"><strong>Register now!</strong></a></p>
            </div>
        </div>
    </div>
@endsection
