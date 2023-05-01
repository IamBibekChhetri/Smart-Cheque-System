<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        foreach ($users as $key => $user) {
            $user->profile_image = $this->getProfileImage($user->profile_image);
        }
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->pan_vat = $request->pan_vat;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->otp = $request->otp;
        $user->status = $request->status;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/images/users', $imageName);
            $user->profile_image = 'images/users/' . $imageName;
        }
        $user->save();
        return redirect()->route('user.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $user->profile_image = $this->getProfileImage($user->profile_image);
        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->pan_vat = $request->pan_vat;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->otp = $request->otp;
        $user->status = $request->status;

        if ($request->hasfile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/images/users', $imageName);
            $this->removeOldProfileImage($user->profile_image);
            $user->profile_image = 'images/users/' . $imageName;
        }
        $user->save();
        return redirect()->route('user.index')->with('msg', 'User Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function getProfileImage($profile_image)
    {
        if (empty($profile_image)) {
            return asset('public/images/logo.png');
        } elseif (file_exists('public/' . $profile_image)) {
            return asset('public/' . $profile_image);
        } else {
            return asset('public/images/logo.png');
        }
    }

    public function removeOldProfileImage($profile_image)
    {
        if (empty($profile_image)) {
            return true;
        } elseif (file_exists('public/' . $profile_image)) {
            unlink('public/' . $profile_image);
            return true;
        } else {
            return true;
        }
    }
}
