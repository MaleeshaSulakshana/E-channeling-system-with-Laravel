@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('patient.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Pay with Paypal</li>
            </ol>

            <div class="row">
                <div class="col-md-6">
                    <div class="box_general padding_bottom">
                        <div class="header_box version_2">
                            <h2><i class="fa fa-lock"></i>Appoinment Details</h2>
                        </div>

                        <div class="form-group">
                            <label>Appointment Number</label>
                            <input class="form-control" type="string" value="{{$data['appointmentNumber']}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input class="form-control" type="string" value="{{$data['appointmentDate']}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input class="form-control" type="string" value="{{$data['scheduledTime']}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Fee</label>
                            <input class="form-control" type="string" value="{{$data['doctor_fee']}}" disabled>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    @if ($message = Session::get('success'))
                        <div class="custom-alerts alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                    <?php Session::forget('success');?>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="custom-alerts alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                    <?php Session::forget('error');?>
                    @endif
                    
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('patient.paypal') !!}">
                            {{ csrf_field() }}
                            
                                <div class="col-md-6">
                                    <input id="amount" type="hidden" class="form-control" name="amount" value="{{$data['doctor_fee']}}" autofocus>
                                    <input id="appointmentNumber" type="hidden" class="form-control" name="appointmentNumber" value="{{$data['appointmentNumber']}}" autofocus>
                                </div>
                            </div>

                            <div class="form-group center">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" style="border:none; background-color:#f8f8f8;" class="center">
                                        <img src="{{ asset('assets/img/paypal.png') }}" style="width:150px; height:35px; background-color:f8f8f8;" />
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <style>
        .center {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
@endsection