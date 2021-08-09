@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Appointments</li>
            </ol>

            <div class="box_general">
                <div class="header_box">
                    <h2 class="d-inline-block">My Appointments</h2>
                </div>

                @foreach($appoinments as $appoinment)
                    <div class="list_general">
                        <ul>
                            <li>
                                <figure><img src="{{ url('/assets/attachments/users') }}/{{ $appoinment['doctor']['users']['image'] }}" alt=""></figure>
                                <h4>{{$appoinment['doctor']['users']['first_name']}} {{$appoinment['doctor']['users']['last_name']}}</h4>
                                <ul class="booking_details">
                                    <li><strong>Appo. Number</strong> {{$appoinment['appointmentNumber']}}</li>
                                    <li><strong>Appointment date</strong>{{$appoinment['appointmentDate']}}</li>
                                    <li><strong>Appointment time</strong> {{$appoinment['scheduledTime']}}</li>
                                </ul> 

                                @if((!$appoinment['appointmentDate']) === $day)
                                    
                                @else
                                    <ul class="buttons">
                                        <li><a href="{{route('patient.delete-appointment', $appoinment['id'])}}" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel appointment</a></li>
                                    </ul>
                                @endif
                            </li>  
                        </ul>

                    </div>
                @endforeach

            </div>

            <nav aria-label="...">
                {{-- {{ $appoinments->links() }} --}}
            </nav>

        </div>
    </div>

@endsection