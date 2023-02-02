<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Type\Decimal;

class AuctionController extends Controller
{
    public function addPrice(Request $request, $id){
        $bien = Bien::findOrFail($id);
        $bienPrices = $bien->prices;
        $biggest = $bien->initialPrice;
        if($bienPrices){
            $prices = [];
            foreach($bienPrices as $price){
            array_push($prices, $price->amount);
            $biggest = max($prices);
        }
        }else{
            $biggest = $bien->initialPrice;
        }
        $requestedPrice = $request->price;

        //dd($requestedPrice);
        if($requestedPrice <= $biggest){
            $validator = "le prix ne doit pas etre inferieur au dernier prix proposé !";
            return Redirect::back()->with('error', $validator);
        }else{
            $newP = new Price();
            $newP->bien_id = $bien->id;
            $newP->amount = (float)$requestedPrice;
            $newP->user_id = auth()->user()->id;
            $newP->save();
            return Redirect::back()->with('success', 'Prix ajouté avec success');

        }

        //check if added price is bigger than the last added or initial
        //add new price
        return 0;
    }

    public function deletePrice(){

    }
}
