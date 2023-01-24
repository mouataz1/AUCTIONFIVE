<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
