@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('patient.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Doctors</li>
        </ol>
        @foreach($doctors as $doctor)
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ url('/assets/attachments/users') }}/{{ $doctor->users->image }}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $doctor->users->first_name}} {{ $doctor->users->last_name }}</h4>
                                    <p class="text-secondary mb-1">{{ $doctor->departments->departmentName }}</p>
                                    <p class="text-muted font-size-sm">{{ $doctor->educationalDegrees }}</p>
                                    @if ($doctor->isActiveForScheduling === 1)
                                        <a href="{{ route('patient.book-appoinment', ['user' => $doctor->id]) }}"><button class="btn btn-success booking_buttton">Avaliable for booking</button></a>
                                    @else
                                        <button class="btn_1 btn btn-danger" disabled>All slots are filled</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                    
                        <form method="POST" enctype="multipart/form-data" action="{{ route('patient.add-review') }}">
                        @csrf
                            <div class="rating"> 
                                <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label> 
                                <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label> 
                                <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label> 
                                <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label> 
                                <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                            </div>
                            <div class="row" style="display: flex; align-items:center; justify-content:center;">

                                <div class="">
                                    <div class="form-group">
                                        <textarea rows="5" placeholder="Enter your review" id="review" class="form-control @error('review') is-invalid @enderror" name="review" required autofocus></textarea>

                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="center mb-2">
                                <input type="hidden" value="{{$doctor->id}}" name="doctor_id">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <button type="submit" class="btn btn-primary mt-2" style="border-radius:25px;">Submit Review</button>
                            </div> 
                        </form>

                    </div>
                    <div class="card mt-3">
                        <div class="well well-sm mt-5 mb-5 ml-1 mr-3">
                            <div class="row">
                                <div class="col-xs-6 col-md-6 text-center">
                                    <h1 class="rating-num">{{ number_format($averageRating, 2) }}</h1>
                                    <div class="center">
                                        {{-- <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                        </span><span class="glyphicon glyphicon-star-empty"></span> --}}
                                        <div class="center">
                                            @for ($i = 0; $i < $averageRating; $i++) <i class="fa fa-star" style="color:#ffc106"></i>
                                            @endfor
                                            @for ($i = 0; $i < 5 - $averageRating; $i++) <i class="fa fa-star-o"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div>
                                        <span class="glyphicon glyphicon-user center"></span><b>out of 5.0</b>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <div class="row rating-desc">
                                        <div class="col-xs-3 col-md-3 text-right">
                                            <span class="glyphicon glyphicon-star"></span>5
                                        </div>
                                        <div class="col-xs-8 col-md-9">
                                            <div class="progress progress-striped">
                                                <div class="progress-bar progress-bar-success" role="progressbar" style="width: {{ round($percentFive) }}%">
                                                   <span class="review-rating-rate__item-fill__fill rating-fill-width1" style="width: {{ round($percentFive) }}%">{{number_format($percentFive, 2)  }} %</span>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-xs-3 col-md-3 text-right">
                                            <span class="glyphicon glyphicon-star"></span>4
                                        </div>
                                        <div class="col-xs-8 col-md-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{ round($percentFour) }}%">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width1" style="width: {{ round($percentFour) }}%">{{number_format($percentFour, 2)  }} %</span>
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="col-xs-3 col-md-3 text-right">
                                            <span class="glyphicon glyphicon-star"></span>3
                                        </div>
                                        <div class="col-xs-8 col-md-9">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ round($percentThree) }}%">
                                                      <span class="review-rating-rate__item-fill__fill rating-fill-width1" style="width: {{ round($percentThree) }}%">{{number_format($percentThree, 2)  }} %</span>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-xs-3 col-md-3 text-right">
                                            <span class="glyphicon glyphicon-star"></span>2
                                        </div>
                                        <div class="col-xs-8 col-md-9">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ round($percentTwo) }}%">
                                                      <span class="review-rating-rate__item-fill__fill rating-fill-width1" style="width: {{ round($percentTwo) }}%">{{number_format($percentTwo, 2)  }} %</span>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div class="col-xs-3 col-md-3 text-right">
                                            <span class="glyphicon glyphicon-star"></span>1
                                        </div>
                                        <div class="col-xs-8 col-md-9">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ round($percentOne) }}%">
                                                    <span class="review-rating-rate__item-fill__fill rating-fill-width1" style="width: {{ round($percentOne) }}%">{{number_format($percentOne, 2)  }} %</span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->doctorName}} {{ $doctor->users->first_name }} {{ $doctor->users->last_name }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Branch</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->branch}}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Specialization</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->departments->departmentName }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Education</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->educationalDegrees }}</strong>
                                </div>
                            </div>
                             <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Avalible On</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->isAvaliableOn }}</strong>
                                </div>
                            </div>
                             <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Avaliable From</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->isAvaliableFrom }} </strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Visit Fee</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>Rs.{{ $doctor->visitFee }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Age</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{\Carbon\Carbon::parse($doctor->users->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years')}}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9">
                                   <strong>{{ $doctor->users->email }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->users->mobileNo }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9">
                                    <strong>{{ $doctor->users->address }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">Reviews</h2>
            </div>
            <div class="list_general reviews">
                <ul>
                    @foreach($comments as $comment)
                    <li>
                        <span>{{ Carbon\Carbon::parse($comment->user->created_at)->toDateString()}}</span>
                        <span class="rating">
                            {{-- @for ($i = 0; $i < $comment->rate; $i++)
                                <i class="fa fa-fw fa-star  yellow"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - $comment->rate; $i++)
                                <i class="fa fa-fw fa-star"></i>
                            @endfor --}}
                            @for ($i = 0; $i < $comment->rate; $i++) <i class="fa fa-star" style="color:#ffc106"></i>
                            @endfor             
                            </span>
                        <figure><img src="{{ url('/assets/attachments/users') }}/{{ $comment->user->image }}" alt=""></figure>
                        <h4>{{$comment->user->first_name}} {{$comment->user->last_name}}</h4>
                        <p>{{ $comment->review}} </p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
         <nav aria-label="...">
                {{ $comments->render() }}
            </nav>
    </div>
</div>
@endsection

@section('css')

<style>
    .col-sm-9{
        color:#333;
    }
    .booking_buttton{
        border-radius:35px;
    }
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
    }

    .rating>input {
        display: none
    }

    .rating>label {
        position: relative;
        width: 1em;
        font-size: 3vw;
        color: #FFD600;
        cursor: pointer
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
    .center{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .glyphicon { 
        margin-right:5px;
    }
    .rating .glyphicon {
        font-size: 22px;
    }
    .rating-num { 
        margin-top:0px;
        font-size: 54px; 
    }
    .progress { 
        margin-bottom: 5px;
    }
    .progress-bar { 
        text-align: left; 
    }
    .rating-desc .col-md-3 {
        padding-right: 0px;
    }
    .sr-only { 
        margin-left: 5px;
        overflow: visible;
        clip: auto; 
    }
    .progress-bar{
        background-color:yellow;
        color:black;
    }

</style>

@endsection
