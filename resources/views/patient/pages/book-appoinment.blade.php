@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('patient.dashboard') }}">Dashbaord</a>
            </li>
            <li class="breadcrumb-item active">Make an appoinment</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fas fa-file-invoice"></i>Appoinment details</h2>
            </div>
            <div class="row" style="background-color:#f8f9fa;">
                <div class="col">
                    <div class="form-group">
                        <div class="list_general">
                            <ul>
                                <li>
                                    @foreach($doctors as $doctor)
                                        <figure><img src="{{ url('/assets/attachments/users') }}/{{ $doctor->users->image }}" alt=""></figure>
                                        <h4>{{ $doctor->users->first_name }} {{ $doctor->users->last_name }}</h4>
                                        <ul class="booking_details">
                                            <li><strong>Telephone</strong>{{ $doctor->users->mobileNo }}</li>
                                            <li><strong>Email</strong> {{ $doctor->users->email }}</li>
                                             <li><strong>Specialization</strong> {{ $doctor->departments->departmentName }}</li>
                                        </ul>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col mt-2">
                    @foreach($doctors as $doctor)
                        <form method="POST" enctype="multipart/form-data" action="{{ route('patient.add-appoinment' , ['user' => $doctor->id]) }}">
                            @csrf
                            <div class=row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Date</label>
                                        @if($doctor->isAvaliableOn =='Weekdays')
                                            <input placeholder="Select your date" id="datepicker" class="form-control @error('appointmentDate') is-invalid @enderror" name="appointmentDate" required autocomplete="isAvaliableFrom" autofocus>
                                        @else
                                            <input placeholder="Select your date" id="weekends" class="form-control @error('appointmentDate') is-invalid @enderror" name="appointmentDate" required autocomplete="isAvaliableFrom" autofocus>
                                        @endif

                                        @error('appointmentDate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input placeholder="Select your time slot" id="scheduledTime" class="form-control @error('scheduledTime') is-invalid @enderror" name="scheduledTime" required autocomplete="isAvaliableFrom" autofocus>
                                        @error('scheduledTime')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" value="{{$doctor->id}}" name="doctor_id" id="doctor_id">
                                <input type="hidden" value="{{$doctor->visitFee}}" name="doctor_fee" id="doctor_fee">
                            </div>
                            <p><button class="btn_1 medium" type="submit">Book Now</button></p>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('js')
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js"></script>

<script>
    $.noConflict();
    var dateToday = new Date();

    jQuery(document).ready(function ($) {
        $("#datepicker").datepicker({
            beforeShowDay: $.datepicker.noWeekends,
            minDate: dateToday,
            dateFormat: 'yy-mm-dd'
        });
        $("#weekends").datepicker({
            beforeShowDay: function(date){ return [date.getDay() == 6 || date.getDay() == 0,""]},
            minDate: dateToday,
            dateFormat: 'yy-mm-dd'
        });
    });
    jQuery(document).ready(function ($) {
        $('#scheduledTime').timepicker({
        'minTime': "{{$doctor->isAvaliableFrom}}",
        'maxTime': '10.00pm',
        'step': 15
        });
    });
</script>
@endsection



