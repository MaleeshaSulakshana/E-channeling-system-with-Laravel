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
                <h2 class="d-inline-block">Doctors List</h2>
                <div class="filter">
                    <div class="container">
                        <div class="row">
                            {{-- <form method="GET" action="{{ route('patient.all-doctors') }}">
                                <div class="input-group">
                                    <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search" style="padding-left: 20px; border-radius: 40px;" id="search" value="{{ old('search') }}">
                                    <div class="input-group-addon" style="margin-left: -50px; z-index: 3; border-radius: 40px; background-color: transparent; border:none;">
                                        <button class="btn btn-warning btn-sm" type="submit" style="border-radius: 20px;" id="search-btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="list_general">
                <ul>
                 @if($doctors->count())
                    @foreach($doctors as $key => $doctor)
                        <li>
                            <figure><img src="{{ url('/assets/attachments/users') }}/{{ $doctor->users->image }}" alt=""></figure>
                            <small><b>{{ $doctor->departments->departmentName}}</b></small>
                            <h4>{{ $doctor->doctorName }}. {{ $doctor->users->first_name}} {{ $doctor->users->last_name}}</h4>
                            <p>{{ $doctor->educationalDegrees }}</p>
                            <p><a href="{{ url('patient/doctor-profile', $doctor->id) }}" class=" btn_1 gray"><i class="fa fa-fw fa-user"></i> View profile</a></p>
                            <ul class="buttons">
                                <li><a href="#0" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
                @else
                <ul>
                    @foreach($doctors as $doctor)
                        <li>
                            <figure><img src="{{ url('/assets/attachments/users') }}/{{ $doctor->users->image }}" alt=""></figure>
                            <small><b>{{ $doctor->departments->departmentName}}</b></small>
                            <h4>{{ $doctor->doctorName }}. {{ $doctor->users->first_name}} {{ $doctor->users->last_name}}</h4>
                            <p>{{ $doctor->educationalDegrees }}</p>
                            <p><a href="{{ url('patient/doctor-profile', $doctor->id) }}" class=" btn_1 gray"><i class="fa fa-fw fa-user"></i> View profile</a></p>
                            <ul class="buttons">
                                <li><a href="#0" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
       
        <nav aria-label="...">
            {{ $doctors->links() }}
        </nav>
    </div>
</div>

@endsection

@section('css')
    <style>
       #mysearch:focus + .input-group-addon {
            z-index: 10;
        }

        #search-btn:hover {
            cursor: pointer;
            background-color: #ffc107;
        }
    </style>
@endsection