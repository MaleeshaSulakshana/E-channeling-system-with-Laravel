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

        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">Department of {{ $departmentName}}</h2>
                <div class="filter">
                    <select name="orderby" class="selectbox">
                        <option value="Any time">Any time</option>
                        <option value="Latest">Latest</option>
                        <option value="Oldest">Oldest</option>
                    </select>
                </div>
            </div>
            <div class="list_general">
                <ul>
                    @foreach( $doctors as $doctor)
                        <li>
                            <figure><img src="{{ url('/assets/attachments/users') }}/{{ $doctor->users->image }}" alt=""></figure>
                            <small><b>{{$doctor->educationalDegrees}}</b></small>
                            <h5>{{ $doctor->doctorName }}. {{ $doctor->users->first_name }} {{ $doctor->users->last_name }}</h5>
                            <p>{{ $doctor->registrationNo }}</p>
                            <p><a href="{{ url('patient/doctor-profile', $doctor->id) }}" class=" btn_1 gray"><i class="fa fa-fw fa-user"></i>View Profile</a></p>
                            <ul class="buttons">
                                <li><a href="" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <nav aria-label="...">
            {{ $doctors->links() }}
        </nav>
    </div>
</div>

@endsection
