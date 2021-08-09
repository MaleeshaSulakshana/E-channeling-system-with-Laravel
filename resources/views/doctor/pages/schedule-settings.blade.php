@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Appoinmet Settings</li>
        </ol>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-cog"></i>Appoinment Status</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Is active for scheduling</label><br>
                        <input data-id="{{$doctor->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="isActiveForScheduling" data-on="Avaliable" data-off="Not Avaliable" {{ $doctor->isActiveForScheduling ? 'checked' : '' }}>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Is session start</label><br>
                        <input data-id="{{$doctor->id}}" class="session" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" name="isRoomCurrentlyOpen" data-on="Start" data-off="Not start" {{ $doctor->isRoomCurrentlyOpen ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('css')

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection

@section('css')
    <style>
        .toggle.btn.btn-success{
            width:50px !important;
            height:50px !important;
        }
    </style>
@endsection

@section('js')

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('.toggle-class').change(function() {
            var isActiveForScheduling = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            console.log(isActiveForScheduling);
            $.ajax({
                type: "GET", 
                dataType: "json", 
                url: "{{ config('app.url') }}/doctor/changeAvaliability",
                data: {
                    'isActiveForScheduling': isActiveForScheduling, 
                    'id': id,
                }, 
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    });
    $(function() {
        $('.session').change(function() {
        var isRoomCurrentlyOpen = $(this).prop('checked') == true ? 1 : 0;
        var id = $(this).data('id');

        console.log(isRoomCurrentlyOpen);
        $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ config('app.url') }}/doctor/changeOnlineStatus",
                data: {
                'isRoomCurrentlyOpen': isRoomCurrentlyOpen,
                'id': id,
            },
                success: function(data) {
                console.log(data.success)
                }
            });
        })
    })
</script>
@endsection