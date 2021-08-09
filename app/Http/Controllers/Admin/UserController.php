<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Hash;
use DataTables;
Use Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user-management.user.index');
    }

    public function getAllUsers()
    {
        $users = DB::table('users')->get();
        return DataTables::of($users)->make();
    }

    public function create()
    {
        return view('admin.user-management.user.create');
    }

    public function store(Request $request)
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
            'role_id' => ['required'],
            'image' => 'required|image|max:3000',
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
                'role_id' => $request->role_id,
                'image' => $image_url,
            ]);
            Alert::success('Success', 'User has created successfully');
            return redirect()->back();
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
            'role_id' => $request->role_id,
            'image' => $image_url,
        ]);

        Alert::success('Success', 'User has created successfully'); 
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-management.user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {      
        $request->validate([
            'first_name' => 'required','string', 'max:255',
            'last_name' => 'required','string', 'max:255',
            'gender' => 'required','string',
            'address'=>'required','string',
            'date_of_birth' => 'date', 'before:-15 years',
            'email' => 'required','string', 'email', 'max:255', 'unique:users',
            'mobileNo' => 'required','regex:/(0)[0-9]{9}/','unique:users',
            'role_id' => 'required','string',
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
            'role_id' => $request->role_id,
            'image' => $image_url,
        ];;
        User::findOrFail($id)->update($data);

        toast('User has been updated!','success');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        toast('User has been deleted!','success');
        return redirect()->back();
    }
}