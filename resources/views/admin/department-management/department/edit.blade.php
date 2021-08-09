@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Department</li>
        </ol>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Department info</h2>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.department.update', ['department' => $user->id]) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" placeholder="Enter deartment name" id="departmentName" class="form-control @error('departmentName') is-invalid @enderror" name="departmentName" value="{{ $user->departmentName }}" required autocomplete="departmentName" autofocus>
                            
                            @error('departmentName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <button type=submit" class="btn_1 medium">Save</button>
            </form>

        </div>
    </div>
</div>
@endsection

