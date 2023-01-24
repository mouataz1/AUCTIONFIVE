<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $validatedData =  $request->validate([
            'title'=>'required|max:120'
        ]); */
        /* Category::create($validatedData);
        return redirect('admin/categories'); */

        // Validate the request data
        $request->validate([
            'title' => 'required|unique:categories|max:255',
        ]);

        // Create a new category
        $category = new Category();
        $category->title = $request->input('title');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            // Find the category by id
            $category = Category::findOrFail($id);

            return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the category by id
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the category by id
        $category = Category::findOrFail($id);

        // Validate the request data
        $request->validate([
            'title' => 'required|unique:categories,title,'.$category->id.'|max:255',
        ]);

        // Update the category
        $category->title = $request->input('title');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            // Find the category by id
            $category = Category::findOrFail($id);

            // Delete the category
            $category->delete();

            return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
}
