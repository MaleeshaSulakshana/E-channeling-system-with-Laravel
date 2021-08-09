@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Doctor Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="card dashboard text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-calendar"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$appoinmentCount}} <br>Appointments!</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('doctor/my-appoinments') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card dashboard text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-star"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$reviewCount}} <br>Reviews!</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ url('doctor/my-reviews') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card dashboard text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-usd"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$toatalEarnings}} <br> Earnings!</h5>

                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card dashboard text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-heart"></i>
                        </div>
                        <div class="mr-5">
                            <h5>10 <br> New Bookmarks!</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <h2></h2>
    </div>
</div>


@endsection
