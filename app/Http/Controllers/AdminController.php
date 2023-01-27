<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function showUser(Request $request, $id){
        $user = User::findOrFail($id);
        $products = Bien::where('user_id', $id)->get();
        return view('admin.userDetails', compact('user', 'products'));
    }

    public function encheres(){
        return view('admin.encheres');
    }
}
