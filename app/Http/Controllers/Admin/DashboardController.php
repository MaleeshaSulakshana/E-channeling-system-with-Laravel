<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AuthenticatesUsers;
use Auth;

use App\User;
use App\Doctor;
use App\Department;
use App\Appoinment;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $userCount = User::count();
        $departmentCount = Department::count();
        $doctorCount = Doctor::count();
        $appointmentCount = Appoinment::count();
        return view('admin.pages.dashboard', compact('userCount','departmentCount','doctorCount','appointmentCount'));
    }
}
