@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('patient.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Departments</li>
        </ol>

        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">Department List</h2>
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
                    @foreach($departments as $department)
                    <li>
                        <figure><img src="{{ asset('assets/img/apple-touch-icon-114x114-precomposed.png') }}" alt=""></figure>
                        <small><b></b></small>
                        <h5>Department of {{ $department->departmentName}}</h5>
                        <p><a href="{{ url('patient/department-profile', $department->id) }}" class="btn_1 gray"><i class="fa fa-fw fa-user"></i> Browse Doctors</a></p>
                        <ul class="buttons">
                            <li><a href="#" class="btn_1 gray delete wishlist_close"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a></li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <nav aria-label="...">
            {{ $departments->links() }}
        </nav>
    </div>
</div>



@endsection