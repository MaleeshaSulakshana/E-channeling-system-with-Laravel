<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Department;
use Hash;
use DataTables;
Use Alert;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department-management.department.index');
    }

    public function getAllDepartments()
    {
        $users = DB::table('departments')->get();
        return DataTables::of($users)->make();
    }

    public function create()
    {
        return view('admin.department-management.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'departmentName' => ['required', 'string', 'max:255'],
        ]);

        Department::create([
            'departmentName' => $request->departmentName,
        ]);

        toast('Department has been created!','success'); 
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = Department::findOrFail($id);
        return view('admin.department-management.department.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {    
        $request->validate([
            'departmentName' => 'required','string', 'max:255',
        ]);
           
        $data = [
            'departmentName' => $request->departmentName,
        ];;
    
        Department::findOrFail($id)->update($data);

        toast('Department has been updated!','success');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $user = Department::findOrFail($id);
        $user->delete();

        toast('Department has been deleted!','success');
        return redirect()->back();
    }
}
