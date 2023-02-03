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

    public function productsByCategory($id){
        $categories = Category::all();
        $cat = Category::findOrFail($id);
        $biens = $cat->bienes;
        return view('shopByCat', compact('categories', 'biens'));
    }

    public function productDetails(Request $request, $id){
        $product = Bien::findOrFail($id);

        $bienPrices = $product->prices;
        $biggest = $product->initialPrice;
        if($bienPrices){
            $prices = [];
            foreach($bienPrices as $price){
            array_push($prices, $price->amount);
            $biggest = max($prices);
        }
        }else{
            $biggest = $$product->initialPrice;
        }

        return view('productDetail', compact('product', 'biggest'));
    }
}
