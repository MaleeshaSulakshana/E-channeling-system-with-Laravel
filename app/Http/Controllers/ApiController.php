<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;

use App\User;
use App\Doctor;
use App\Department;
use App\Review;

class ApiController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->guard = "api";
    }

    public function login(Request $request)
    {

    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        if (! $token = auth($this->guard)->attempt(array_merge($validator->validated()))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'date_of_birth' => ['required', 'date', 'before:-15 years'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'mobileNo' => 'required|unique:users|regex:/(0)[0-9]{9}/',
            'role_id' => ['required'],
            'image' => 'nullable|image|max:3000',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $directory = md5(uniqid());
            $image_url = '/' . $directory . '/image.png';

            Storage::disk('users')->putFileAs($directory, $image, 'image.png');
            $user = User::create(array_merge([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobileNo' => $request->mobileNo,
                'role_id' => $request->role_id,
                'image' => $image_url,
            ]));

            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        
        } else {
            $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));

            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user
            ], 201);
        }
    }

    public function logout() 
    {
        auth($this->guard)->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh() 
    {
        return $this->createNewToken(auth($this->guard)->refresh());
    }
    
    public function userProfile() 
    {
        return response()->json(auth($this->guard)->user());
    }

    public function getAllDoctors()
    {
        $doctors =  Doctor::with('users', 'departments')->get();
        return response()->json([
            'doctors' => $doctors 
        ], 200);
    }

    public function getAllDepartments()
    {
        $departments = DB::table('departments')->get();
        return response()->json([
            'departments' => $departments 
        ], 200);
    }

    public function getDepartmentProfile($id)
    {
        $departmentName = Department::where('id', $id)->value('departmentName');
        $doctors = Doctor::where('department_id', $id)->with('users')->get();
        return response()->json([ 
            'departmentName'=> $departmentName,
            'doctors'=> $doctors
        ], 200);
    }

    public function getPatientAppoitmentCount()
    {   
        $appointments = DB::table('appoinments')->where('user_id', (auth($this->guard)->user()->id))->count();
        return response()->json([ 
            'appointmentCount'=> $appointments
        ], 200);
    }
    
    public function index()
    {
        $doctors = DB::table('doctors')->count();
        $departments = DB::table('departments')->count();
        return response()->json([ 
            'doctors_count' => $doctors, 
            'departments_count'=> $departments
        ], 200);
    }

}
