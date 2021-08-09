@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
    
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Bookings</li>
        </ol>

        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">Appoinments List</h2>
            </div>
            @foreach($appoinments as $appoinment)

                <div class="list_general">
                    <ul>
                        <li>
                            <figure><img src="{{ url('/assets/attachments/users') }}/{{ $appoinment->user->image }}" alt=""></figure>
                                <h4>{{$appoinment->user->first_name}} {{$appoinment->user->last_name}}

                                @if($appoinment->isbooked == 0)
                                    <i class="pending">Pending</i>
                                @else
                                    <i class="success">Booked</i>
                                @endif
                            </h4>
                            <ul class="booking_details">
                                <li><strong>Appo. Number</strong> {{$appoinment->appointmentNumber}}</li>
                                <li><strong>Appointment date</strong>{{$appoinment->appointmentDate}}</li>
                                <li><strong>Appointment time</strong> {{$appoinment->scheduledTime}}</li>
                            </ul>

                            <ul class="buttons">
                                <li><a href="{{route('doctor.delete-appointment', $appoinment['id'])}}" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel appointment</a></li>
                                @if($appoinment->isCancelled == 0)
                                    <li><a href="{{route('doctor.mark-as-delayed', $appoinment['id'])}}" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Mark as delayed</a></li>
                                @else
                                    <button class="btn_1 gray delete wishlist_close disabled" style="background-color:red; font-color:white; color:white;" disabled>Already Mark as delayed</a></button>
                                @endif

                            </ul>
                        </li>
                    </ul>
                </div>

            @endforeach

        </div>
  
        <nav aria-label="...">
            {{ $appoinments->links() }}
        </nav>
       
    </div>
 
</div>

@endsection