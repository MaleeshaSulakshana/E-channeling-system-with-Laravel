<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CancelLink;
use App\Mail\AppointmentDelay;
use Illuminate\Support\Facades\Crypt;

use Auth;
use App\User;
use App\Doctor;
use App\Department;
use App\Appoinment;
use App\Review;

class DashboardController extends Controller
{
    public function index()
    {   
        $doctorId = DB::table('doctors')->where('user_id', Auth::user()->id)->value('id'); 
        $userId = DB::table('users')->where('id', $doctorId)->value('id');
        $appoinmentCount = Appoinment::where('doctor_id', $userId )->count();
        $reviewCount = Review::where('doctor_id', $userId )->count();
        $transactions = DB::table('doctors')->where('user_id', Auth::user()->id)->value('visitFee');
        $toatalEarnings = ($transactions *  $appoinmentCount );
        return view('doctor.pages.dashboard', compact('appoinmentCount', 'reviewCount', 'toatalEarnings'));
    }

    public function getMyProfile()
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $doctor = DB::table('doctors')->where('user_id', $id)->get()->toArray()[0]; 
        $departmentId = DB::table('doctors')->where('user_id', $id)->select('department_id')->value('departmentName');
        $department = DB::table('departments')->where('id', $departmentId)->value('departmentName');      
        return view ('doctor.pages.my-profile', compact('user','doctor','department'));
    }

    public function changeScheduleSettings()
    {
        $id = Auth::user()->id;
        $doctor = DB::table('doctors')->where('user_id', $id)->get()->toArray()[0]; 
        return view('doctor.pages.schedule-settings', compact('doctor'));
    }
    
    public function changeAvaliabilty(Request $request)
    {
        $request->validate([
            'isActiveForScheduling' => 'required','string', 'max:255',
        ]);

        $data = [
            'isActiveForScheduling' => $request->isActiveForScheduling,
        ];

        Doctor::findOrFail($request->id)->update($data);
        toast('Avaliabilty has been updated!','success');
        return redirect()->back();
    }

    public function setOnlineStatus(Request $request)
    {
        $request->validate([
            'isRoomCurrentlyOpen' => 'required','string', 'max:255',
        ]);

        $data = [
            'isRoomCurrentlyOpen' => $request->isRoomCurrentlyOpen,
        ];

        Doctor::findOrFail($request->id)->update($data);
        toast('Online status has been updated!','success');
        return redirect()->back();
    }

    public function getAllAppoinments()
    {
        $doctorId = DB::table('doctors')->where('user_id', Auth::user()->id)->value('id'); 
        $userId = DB::table('users')->where('id', $doctorId)->value('id');
        $appoinments = Appoinment::where('doctor_id', $userId )->with('user')->paginate(4);
        return view('doctor.pages.all-appoinments', compact('appoinments'));
    }

    public function getMyReviews()
    {   
        $doctorId = DB::table('doctors')->where('user_id', Auth::user()->id)->value('id'); 
        $comments =  DB::table('reviews')->where('doctor_id', $doctorId )->get();
        return view('doctor.pages.my-reviews', compact('comments'));
    }

    public function deleteAppointment(Request $request, $id)
    {
        $appointment = Appoinment::findOrFail($id);
        $appointment->delete();
        $email = DB::table('users')->where('id', $appointment->user_id)->value('email');
        Session::push('data',['details' => $appointment, 'email'=> $email]);
        return redirect()->route('doctor.send-email');
    }

    public function sendEmail(Request $request)
    {
        $current_session = Session::get('data');
        $data = end($current_session);
        $email = $data['email'];

        $link = $data['details'];
        Mail::to($email)->send(new CancelLink($link));

        toast('Appointment has been cancelled!','success');
        return redirect()->back();
    }

    public function markAsDelayed(Request $request, $id)
    {
        Appoinment::findOrFail($id)->update(['isCancelled' => 1]);
        $appointment = Appoinment::findOrFail($id);
        $email = DB::table('users')->where('id', $appointment->user_id)->value('email');
        Session::push('data',['details' => $appointment, 'email'=> $email]);
        return redirect()->route('doctor.send-delay-email');
    }

    public function sendDelayEmail(Request $request)
    {
        $current_session = Session::get('data');
        $data = end($current_session);
        $email = $data['email'];

        $link = $data['details'];
        Mail::to($email)->send(new AppointmentDelay($link));
        toast('Appointment marked as delayed!','success');
        return redirect()->back();
    }
}
