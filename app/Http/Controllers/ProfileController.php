<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('user/profile');
    }

    public function update(Request $request, $id){
        //dd($id);
        /* $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'lname' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'country_code' => 'required',
            'state' => 'required',
        ]); */

        $user = User::find($id);
        //dd($user);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->lname = $request->input('lname');
        $user->city = $request->input('city');
        $user->zip_code = $request->input('zip_code');
        $user->country_code = $request->input('country_code');
        $user->state = $request->input('state');
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function updatePassword(Request $request, $id){
        //dd($request);
        /* $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]); */

        $user = User::find($id);
        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully!');
        }
        else {
            return redirect()->back()->with('error', 'Incorrect old password');
        }
    }
}
