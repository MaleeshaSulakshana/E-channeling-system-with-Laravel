@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add extra data</li>
        </ol>

        <div class="box_general padding_bottom">

            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Extra Data</h2>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.doctor.save.extra_data', $id) }}">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                            <select type="text" placeholder="Select title" id="doctorName" class="form-control @error('doctorName') is-invalid @enderror" name="doctorName" value="{{ old('doctorName') }}" required autocomplete="doctorName" autofocus>
                                <option selected disabled>Select Title</option>
                                <option value="Dr">Doctor</option>
                                <option value="Prof">Professor</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                            </select>

                            @error('doctorName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Registration Number</label>
                            <input type="text" placeholder="Enter registration number" id="registrationNo" class="form-control @error('registrationNo') is-invalid @enderror" name="registrationNo" value="{{ old('registrationNo') }}" required autocomplete="registrationNo" autofocus>

                            @error('registrationNo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Branch</label>
                            <select type="text" placeholder="Select branch" id="branch" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}" required autocomplete="branch" autofocus>
                                <option selected disabled>Select Branch</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Nugegoda">Nugegoda</option>
                                <option value="Maharagama">Maharagama</option>
                                <option value="Kottawa">Kottawa</option>
                                <option value="Homagama">Homagama</option>
                            </select>

                            @error('branch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Specialize area</label>
                            <select placeholder="Select speaclization" id="department_id" class="form-control @error('department_id') is-invalid @enderror" name="department_id" value="{{ old('department_id') }}" required autocomplete="department_id" autofocus>
                                <option selected disabled>Select specialization area</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->departmentName }}</option>
                                @endforeach
                            </select>

                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Education Qualifications</label>
                            <input type="string" placeholder="Enter qualifications" id="educationalDegrees" class="form-control @error('educationalDegrees') is-invalid @enderror" name="educationalDegrees" value="{{ old('educationalDegrees') }}" required autocomplete="educationalDegrees" autofocus>

                            @error('educationalDegrees')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input type="text" placeholder="Room number" id="roomNumber" class="form-control @error('roomNumber') is-invalid @enderror" name="roomNumber" value="{{ old('roomNumber') }}" required autocomplete="roomNumber" autofocus>

                            @error('roomNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Visit fee</label>
                            <input type="text" placeholder="Visit fee" id="visitFee" class="form-control @error('visitFee') is-invalid @enderror" name="visitFee" value="{{ old('visitFee') }}" required autocomplete="visitFee" autofocus>

                            @error('visitFee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Avaliability</label>
                            <select type="text" placeholder="" id="isAvaliableOn" class="form-control @error('isAvaliableOn') is-invalid @enderror" name="isAvaliableOn" value="{{ old('isAvaliableOn') }}" required autocomplete="isAvaliableOn" autofocus>
                                <option selected disabled>Avaliable on</option>
                                <option value="Weekdays">Weekdays</option>
                                <option value="Weekends">Weekends</option>
                            </select>

                            @error('isAvaliableOn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Avaliable from</label>
                            <input type="time" placeholder="Avaliable from" id="isAvaliableFrom" class="form-control @error('isAvaliableFrom') is-invalid @enderror" name="isAvaliableFrom" value="{{ old('isAvaliableFrom') }}" required autocomplete="isAvaliableFrom" autofocus>

                            @error('isAvaliableFrom')
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

