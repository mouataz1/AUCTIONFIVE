<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function biens(){
        $biens = Bien::all();
        return view('admin.adminProducts', compact('biens'));
    }

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
        $today = new DateTime();
        $encheres = Bien::whereDate('due_at', $today)->get();
        return view('admin.encheres', compact('encheres'));
    }
}
