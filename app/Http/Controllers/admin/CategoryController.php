<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   // this is comment
        $categories = Category::all();
        return view('admin.category.categories', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);

        $res = Category::create([
            'name' => $request->name,
        ]);

        if($res){
            return redirect()->back()->with("message", "Category added successfully.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit-category', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
        ]);

        $cat = Category::find($id)->update([
            'name' => $request->name,
        ]);

        if($cat){
            return redirect()->back()->with("message", "Category updated successfully.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category->delete()){
            return redirect()->back()->with("message", "Category deleted successfully.");
        }
    }
}
