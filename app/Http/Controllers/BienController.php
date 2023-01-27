<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Http\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biens = Bien::all();
        return view('user.bienes', compact('biens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('user.bien.newBien', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'initialPrice' => 'required|numeric',
            'due_at' => 'required|date',
            'category_id'=>'required|numeric',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $bien =  Bien::create([
            'category_id'=>$request->category_id,
            'user_id'=> auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'initialPrice' => $request->initialPrice,
            'due_at' => $request->due_at,
        ]);


        if ($request->hasFile('image')) {
            //dd($request->image );
            foreach($request->image as $image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('bien_imgs'), $imageName);
                $bien->images()->create([
                    'link' => $imageName
                ]);
            }
        }



        return redirect()->route('biens')->with('success', 'Bien created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bien = Bien::findOrFail($id);

        return view('user.bien.showBien', compact('bien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bien = Bien::findOrFail($id);
        $categories = Category::all();

        return view('user.bien.updateBien', compact('bien', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'initialPrice' => 'required|numeric',
            'due_at' => 'required|date',
        ]);

        Bien::whereId($id)->update($validatedData);

        return redirect()->route('biens')->with('success', 'Bien updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bien = Bien::findOrFail($id);
        $bien->delete();

        return redirect()->route('biens')->with('success', 'Bien deleted successfully.');
    }

    public function approve(Request $request, $id){
        $bien = Bien::findOrFail($id);
        $bien->is_Approved = True;
        return redirect()->route('biens')->with('success', 'Bien apprevé avec succes');
    }

    public function banner(Request $request, $id){
        $bien = Bien::findOrFail($id);
        $bien->is_Approved = False;
        return redirect()->route('biens')->with('success', 'Bien banné avec succes');
    }

    public function activate(Request $request, $id){
        $bien = Bien::findOrFail($id);
        $bien->is_active = True;
        return redirect()->route('biens')->with('success', 'Bien activé avec succes');
    }

    public function desactivate(Request $request, $id){
        $bien = Bien::findOrFail($id);
        $bien->is_active = False;
        return redirect()->route('biens')->with('success', 'Bien désactivé avec succes');
    }

    public function setAsSod(Request $request, $id){
        $bien = Bien::findOrFail($id);
        $bien->is_sold = true;
        return redirect()->route('biens')->with('success', 'Bien déclaré comee etant vondue');
    }
}
