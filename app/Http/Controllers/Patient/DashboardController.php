<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Session;
use Cookie;
use Hash;
use Carbon\Carbon;
use App\User;
use App\Doctor;
use App\Department;
use App\Review;
use App\Appoinment;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')->count();
        $departments = DB::table('departments')->count();
        $appointments = DB::table('appoinments')->where('user_id', Auth::User()->id)->count();
        return view('patient.pages.dashboard', ['doctors_count' => $doctors, 'departments_count'=> $departments, 'appointments'=> $appointments]);
    }

    public function getAllDoctors(Request $request)
    {   
        $doctors =  Doctor::with('users', 'departments')->paginate(5);

        // if($request->has('search')){
        //     $doctors = Doctor::search($request->search)->paginate(5);
        // }else{
        //     $doctors = Doctor::with('users', 'departments')->paginate(5);
        // }
        return view('patient.pages.doctor', [ 'doctors' => $doctors]);
    }

    public function getDoctorProfile(Request $request, $id)
    {   
        $user = Auth::user();
        $doctors =  Doctor::where('id', $id)->with('users', 'departments')->get();
        $reviews =Doctor::with('review', 'review.user')->findOrFail($id);
        $comments = $reviews->review()->paginate(3);
        $feedbacks = $reviews->review()->get();
      
        $starOne = $reviews->review->where('rate', 1)->count();
        $starTwo = $reviews->review->where('rate', 2)->count();
        $starThree = $reviews->review->where('rate', 3)->count();
        $starFour = $reviews->review->where('rate', 4)->count();
        $starFive = $reviews->review->where('rate', 5)->count();

        $noOfStars = $starOne + ($starTwo * 2) + ($starThree * 3) + ($starFour * 4) + ($starFive * 5);

        $total = $reviews->review->count();
    
        if($total == 0)
        {
            $percentOne = 0;
            $percentTwo = 0;
            $percentThree = 0;
            $percentFour = 0;
            $percentFive = 0;
            $averageRating = 0;
        }
        else
        {
            $percentOne = $starOne / $total * 100;
            $percentTwo = $starTwo / $total * 100;
            $percentThree = $starThree / $total * 100;
            $percentFour = $starFour / $total * 100;
            $percentFive = $starFive / $total * 100;
            $averageRating = $noOfStars / $total;
        }

        if( $request->is('api/*')){
            return response()->json([
                'doctor'=> $doctors, 
                'reviews'=> $feedbacks, 
                'total_comments'=> $total, 
                'average_rating'=>$averageRating 
            ],200);
        }

        return view('patient.pages.doctor-profile', compact( 
            'percentOne',
            'percentTwo',
            'percentThree',
            'percentFour',
            'percentFive',
            'total',
            'averageRating',
            'doctors',
            'comments'
        ));
    }

    public function getAllDepartments()
    {
        $departments = DB::table('departments')->paginate(5);
        return view('patient.pages.department', ['departments' => $departments]);
    }

    public function getDepartmentProfile(Request $request,$id)
    {
        $departmentName = Department::where('id', $id)->value('departmentName');
        // $departments = Department::with('users', 'doctors')->where('id', $id)->get();
        $doctors = Doctor::where('department_id', $id)->with('users')->paginate(5);

        if( $request->is('api/*')){
            return response()->json([
                'dcotor'=> $doctors, 
                'department'=> $departmentName
            ],200);
        }

        return view('patient.pages.department-profile',  [ 'doctors'=> $doctors, 'departmentName'=> $departmentName]);
    }

    public function getProfile()
    {   
        $user = Auth::user();
        return view ('patient.pages.my-profile', [ 'user'=> $user]);
    }

    public function updateProfile(Request $request, $user)
    {      
        $request->validate([
            'first_name' => 'required','string', 'max:255',
            'last_name' => 'required','string', 'max:255',
            'gender' => 'required','string',
            'address'=>'required','string',
            'date_of_birth' => 'date', 'before:-15 years',
            'email' => 'required','string', 'email', 'max:255', 'unique:users',
            'mobileNo' => 'required','regex:/(0)[0-9]{9}/','unique:users',
            'image' => 'nullable|image|max:3000',
        ]);
        $image_url = $request->old_image;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $directory = md5(uniqid());
            $image_url = '/' . $directory . '/image.png';

            Storage::disk('users')->putFileAs($directory, $image, 'image.png');
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address'=>$request->address,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobileNo' => $request->mobileNo,
            'image' => $image_url,
        ];
        User::findOrFail($user)->update($data);

        toast('Your profile has been updated!','success');
        return redirect()->back();
    }

    public function bookAppoinment(Request $request, $user)
    {   
        $users = Auth::User();
        $doctors =  Doctor::where('id', $user)->with('users', 'departments')->get();
        return view ('patient.pages.book-appoinment', ['users'=> $users, 'doctors'=> $doctors]);
    }
    
    public function getAppoinments()
    {   
        $day = Carbon::now()->format('Y-m-d');
        $appoinments = Appoinment::where([['user_id', Auth::User()->id], ['isBooked', '=' , '1']])->with('doctor.users')->get()->toArray();
        return view ('patient.pages.my-appoinments', compact('appoinments', 'day'));
    }

    public function addReview(Request $request)
    {
        $request->validate([
            'rate' =>  'required',
            'review' =>'required',
        ]);

        $form_data = array(
            'rate' =>$request->rate,
            'review' =>$request->review,
            'user_id' => auth()->user()->id,
            'doctor_id' =>$request->doctor_id,

        );
            $id = auth()->user()->id;
            $doctor_id = $request->doctor_id;
        
        if (Review::where('user_id', $id)->where('doctor_id',$doctor_id)->exists())
        {
            toast('You have already submitted review for this doctor!','warning');
            return back();
        }
        else
        {
            Review::create($form_data);     
            toast('Review added','success');
            return redirect()->back();
        }
    }

    public function createAppoinment(Request $request)
    {   
        $time = Appoinment::where([['scheduledTime', '=', $request->input('scheduledTime')],['doctor_id', '=', $request->user]])->whereDate('appointmentDate', '=', $request->input('appointmentDate'))->first();
        $prefix = "#"; 
        $request->validate([
            'appointmentDate' =>  'required',
            'scheduledTime' =>'required',
        ]);
        $form_data = array(
            'appointmentDate' =>$request->appointmentDate,
            'scheduledTime' =>$request->scheduledTime,
            'user_id' => auth()->user()->id,
            'doctor_id' =>$request->doctor_id,
            'doctor_fee' =>$request->doctor_fee,
            'appointmentNumber' => IdGenerator::generate(['table' => 'appoinments', 'field' => 'appointmentNumber' ,'length' => 9, 'prefix' =>$prefix]),
            'isCurrentlyActive' => 1,
            'isbooked'=> 0,
            'isCancelled'=> 0
        );
        if ($time === null) {
            Appoinment::create($form_data);   
            $data = $form_data;
                toast('Appoinment created','success');
                Session::push('data' , $data);
                return redirect()->route('patient.paywithpaypal');
        } else {
            toast('Above time slot already allocated','danger');
            return redirect()->back();
        }
       
    }

    public function deleteAppointment(Request $request, $id)
    {
        $appointment = Appoinment::findOrFail($id);
        $appointment->delete();

        toast('Appointment has been cancelled!','success');
        return redirect()->back();
    }
}
