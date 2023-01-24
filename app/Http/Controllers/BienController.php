<?php

namespace App\Http\Controllers;

use App\Models\Bien;
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
        return view('user.bienes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'initialPrice' => 'required|numeric',
            'is_Approved' => 'required|boolean',
            'is_Sold' => 'required|boolean',
            'is_Active' => 'required|boolean',
            'due_at' => 'required|date',
        ]);

        Bien::create($validatedData);

        return redirect()->route('bien.index')->with('success', 'Bien created successfully.');
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

        return view('bien.show', compact('bien'));
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

        return view('bien.edit', compact('bien'));
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
            'is_Approved' => 'required|boolean',
            'is_Sold' => 'required|boolean',
            'is_Active' => 'required|boolean',
            'due_at' => 'required|date',
        ]);

        Bien::whereId($id)->update($validatedData);

        return redirect()->route('bien.index')->with('success', 'Bien updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bien  $bien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bien::destroy($id);

        return redirect()->route('bien.index')->with('success', 'Bien deleted successfully.');
    }
}
