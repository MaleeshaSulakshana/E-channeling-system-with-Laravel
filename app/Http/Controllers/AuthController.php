<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\User;
use Hash;
use DataTables;
Use Alert;

class AuthController extends Controller
{
    public function registerUser(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'date_of_birth' => ['required', 'date', 'before:-15 years'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'mobileNo' => 'required|unique:users|regex:/(0)[0-9]{9}/',
            'image' => 'nullable|image|max:3000',
        ]);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $directory = md5(uniqid());
            $image_url = '/' . $directory . '/image.png';

            Storage::disk('users')->putFileAs($directory, $image, 'image.png');
            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobileNo' => $request->mobileNo,
                'image' => $image_url,
            ]);
            Alert::success('Success', 'User has created successfully');
            return redirect()->route('login');
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobileNo' => $request->mobileNo,
        ]);

        Alert::success('Success', 'User has created successfully'); 
        return redirect()->route('login');
    }
}
