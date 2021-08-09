<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Department;
use App\Doctor;
use Hash;
use DataTables;
Use Alert;

class DoctorController extends Controller
{
    public function index()
    {
        return view('admin.doctor-management.doctor.index');
    }

    public function getAllDoctors()
    {
        $users = DB::table('users')->where('role_id', '3' )->get();
        return DataTables::of($users)->make();
    }

    public function addExtraData($id){
        $departments = Department::all();
        return view('admin.doctor-management.doctor.add_extra_data', ['id' => $id, 'departments'=> $departments]);
    }

     public function saveExtraData(Request $request, $id){

        $request->validate([
            'doctorName' => ['required', 'string', 'max:255'],
            'registrationNo' => ['required', 'string', 'max:255'],
            'department_id'=> ['required','string'],
            'educationalDegrees'=> ['required', 'string'],
            'roomNumber'=> ['required', 'string'],
            'branch'=> ['required', 'string'],
            'visitFee'=> ['required', 'string'],
            'isAvaliableOn'=> ['required', 'string'],
            'isAvaliableFrom'=> ['required', 'string'],
        ]);

        Doctor::create([
            'doctorName' => $request->doctorName,
            'registrationNo' => $request->registrationNo,
            'department_id' => $request->department_id,
            'educationalDegrees' => $request->educationalDegrees,
            'roomNumber' => $request->roomNumber,
            'branch'=> $request->branch,
            'visitFee' => $request->visitFee,
            'isAvaliableOn' => $request->isAvaliableOn,
            'isAvaliableFrom' => $request->isAvaliableFrom,
            'user_id' => $id,
        ]);     

        toast('successfully added','success')->timerProgressBar()->autoClose(1000);
        return redirect()->back();
    }

}
