<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home () {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function shop(){
        $biens = Bien::all();
        $categories = Category::all();
        return view('shop', compact('biens', 'categories'));
    }

    public function productDetails(Request $request, $id){
        $product = Bien::findOrFail($id);
        return view('productDetail', compact('product'));
    }
}
