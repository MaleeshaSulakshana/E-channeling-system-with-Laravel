@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
     
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
       
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-envelope-open"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$userCount}} <br> Users</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-star"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$doctorCount}} <br> Doctors</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-calendar-check-o"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$departmentCount}} <br> Departments</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card dashboard text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-heart"></i>
                        </div>
                        <div class="mr-5">
                            <h5>{{$appointmentCount}} <br> Appointments <br></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <h2></h2>
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-bar-chart"></i>Statistic</h2>
            </div>
            <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var ctx = document.getElementById('myAreaChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', 
            data: {
                labels: ['Users', 'Doctors', 'Departments', 'Appointments'], 
                    datasets: [{
                    label: 'Count', 
                    data: [
                        {{$userCount}},
                        {{$doctorCount}},
                        {{$departmentCount}},
                        {{$appointmentCount}}
                    ], 
                    backgroundColor: [
                        'rgba(0, 123, 255)',
                        'rgba(255, 193, 7)',
                        'rgba(40, 167, 69)',
                        'rgba(220, 53, 69)',
                    ], 
                    borderColor: [
                        'rgba(255, 255, 255)',
                        'rgba(255, 255, 255)',
                        'rgba(255, 255, 255)',
                        'rgba(255, 255, 255)',
                    ], 
                    borderWidth: 5
                }]
            }, 
            options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

</script>

@endsection