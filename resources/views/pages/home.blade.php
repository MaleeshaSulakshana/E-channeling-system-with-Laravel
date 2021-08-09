@extends('layouts.app')

@section('content')

	<div class="hero_home version_1">
	    <div class="content">
	        <h3>Find a Doctor!</h3>
	        <p>
	            Simple than you think.
	        </p>
	        {{-- <form method="post" action="list.html">
	            <div id="custom-search-input">
	                <div class="input-group">
	                    <input type="text" class=" search-query" placeholder="Ex. Name, Specialization ....">
	                    <input type="submit" class="btn_search" value="Search">
	                </div>
	                <ul>
	                    <li>
	                        <input type="radio" id="all" name="radio_search" value="all" checked>
	                        <label for="all">All</label>
	                    </li>
	                    <li>
	                        <input type="radio" id="doctor" name="radio_search" value="doctor">
	                        <label for="doctor">Doctor</label>
	                    </li>
	                    <li>
	                        <input type="radio" id="clinic" name="radio_search" value="clinic">
	                        <label for="clinic">Clinic</label>
	                    </li>
	                </ul>
	            </div>
	        </form> --}}
	    </div>
	</div>

	<div class="container margin_120_95">
	    <div class="main_title">
	        <h2>Discover the <strong>online</strong> appointment!</h2>
	        <p>Findoctor enables patients to search for top doctors in the locality and book confirmed appointments.</p>

	    </div>
	    <div class="row add_bottom_30">
	        <div class="col-lg-4">
	            <div class="box_feat" id="icon_1">
	                <span></span>
	                <h3>Find a Doctor</h3>
	                <p>Select your prefered doctor among 1000 of doctors.</p>
	            </div>
	        </div>
	        <div class="col-lg-4">
	            <div class="box_feat" id="icon_2">
	                <span></span>
	                <h3>View profile</h3>
	                <p>Check his ratings and available time slots.</p>
	            </div>
	        </div>
	        <div class="col-lg-4">
	            <div class="box_feat" id="icon_3">
	                <h3>Book a visit</h3>
	                <p>If you find the best make an appointment to meet him.</p>
	            </div>
	        </div>
	    </div>
	   
	    <p class="text-center"><a href="{{ url('patient/all-doctors') }}" class="btn_1 medium">Find Doctor</a></p>

	</div>

	<div id="app_section">
	    <div class="container">
	        <div class="row justify-content-around">
	            <div class="col-md-5">
	                <p><img src="{{ asset('assets/img/app_img.svg') }}" alt="" class="img-fluid" width="500" height="433"></p>
	            </div>
	            <div class="col-md-6">
	                <small>Application</small>
	                <h3>Download <strong>Findoctor App</strong> Now!</h3>
	                <p class="lead">Book appointment and access your records using our DocPulse App. Download it from Google Play Store or Apple store.</p>
	                <div class="app_buttons wow" data-wow-offset="100">
	                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
	                        <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
	                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
	                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
	                    </svg>
	                    <a href="#0" class="fadeIn"><img src="{{ asset('assets/img/apple_app.png') }}" alt="" width="150" height="50" data-retina="true"></a>
	                    <a href="#0" class="fadeIn"><img src="{{ asset('assets/img/google_play_app.png') }}" alt="" width="150" height="50" data-retina="true"></a>

	                </div>
	            </div>
	        </div>
	      
	    </div>
	 
	</div>

@endsection