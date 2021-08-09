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
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       <tfoot>
                            <tr>
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> 
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
                url: "{{ config('app.url') }}/admin/department/get/all",
                type: "GET",
                cache: false,
                error: function () {
                    $("#users").append('<tbody class="errors"><tr><th colspan="7">No Data to show</th></tr></tbody>');
                }
            },
            "columns": [
                {data: 'id'},
                {data: 'departmentName'},
                {data: 'id'},
            ],
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var image = `<img src="{{ url('/assets/attachments/users/') }}/` + aData[
                        'image'] +
                    `"data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" width="40" height="40" >`;
                $('td:eq()', nRow).html(aData['id']);
                $('td:eq(1)', nRow).html(aData['departmentName']);

                var actions = '<a href="{{ route("admin.department.index") }}/' + aData['id'] +'/edit" class="btn btn-xs btn-warning mr-2"><i class="fa fa-pencil"></i></a>';
                actions += `<form action="{{ route("admin.department.index") }}/` + aData['id'] +`" method="post" onsubmit="return confirm('Are you sure you want to delete?');" style='display: -webkit-inline-box;'>`;
                actions += '@csrf @method("Delete")';
                actions +='<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>';
                actions += '</a>';
                $('td:eq(2)', nRow).html(actions);
            }
        });
    });

</script>

@endsection