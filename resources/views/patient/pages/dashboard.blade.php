@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('patient.dashboard') }}">Patient Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="card dashboard text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-stethoscope"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{ $doctors_count }}<br> Doctors</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('patient.all-doctors') }}">
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
                            <h5>{{ $departments_count }} <br>Specializations</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('patient.all-departments') }}">
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
                            <i class="fa fa-fw fa-calendar-check-o"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$appointments}} <br>Appointments!</h5>
                        </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{ route('patient.my-appoinments') }}">
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
                            <h5>10 <br>New Bookmarks!</h5>
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
    </div>
</div>


@endsection
