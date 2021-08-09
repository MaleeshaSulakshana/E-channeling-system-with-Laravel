@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
       
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Users</li>
        </ol>

        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                     <table id="users" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> 
                    </table>
                </div>
            </div>
        </div> 
    </div> 
</div>

@endsection

@section('js')

<script>

    $(function () {
        var table = $('#users').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{{ config('app.url') }}admin/user/get/all",
                type: "GET",
                cache: false,
                error: function () {
                    $("#users").append('<tbody class="errors"><tr><th colspan="7">No Data to show</th></tr></tbody>');
                }
            },
            "columns": [
                {data: 'image'},
                {data: 'first_name'},
                {data: 'last_name'},
                {data: 'email'},
                {data: 'address'},
                {data: 'id'},
            ],
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var image = `<img src="{{ url('/assets/attachments/users/') }}/` + aData[
                        'image'] +
                    `"data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" width="40" height="40" >`;
                $('td:eq(0)', nRow).html(image);
                $('td:eq(1)', nRow).html(aData['first_name']);
                $('td:eq(2)', nRow).html(aData['last_name']);
                $('td:eq(3)', nRow).html(aData['email']);
                $('td:eq(4)', nRow).html(aData['address']);

                var actions = '<a href="{{ route("admin.user.index") }}/' + aData['id'] +'/edit" class="btn btn-xs btn-warning mr-2"><i class="fa fa-pencil"></i></a>';
                actions += `<form action="{{ route("admin.user.index") }}/` + aData['id'] +`" method="post" onsubmit="return confirm('Are you sure you want to delete?');" style='display: -webkit-inline-box;'>`;
                actions += '@csrf @method("Delete")';
                actions +='<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>';
                actions += '</a>';
                $('td:eq(5)', nRow).html(actions);
            }
        });
    });

</script>

@endsection


