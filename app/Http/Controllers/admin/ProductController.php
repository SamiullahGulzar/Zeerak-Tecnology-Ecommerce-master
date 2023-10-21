<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.products', ['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add-product', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'category' => ['required'],
            'stock_status' => ['required'],
            'image' => ['required', 'mimes:jpg, jpeg'],
        ]);
        $res = '';

        $filename = uniqid().'.'.$request->image->extension();
        $out = $request->image->storeAs('images/products', $filename);

        if($out){
            $res = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category_id' => $request->category,
                'stock_status' => $request->stock_status,
                'image' => $filename,
            ]);
        }

        if($res){
            return redirect()->route('product.index')->with('message', 'Product added successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit-product', ['product'=> $product, 'categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'category' => ['required'],
            'stock_status' => ['required'],
        ]);
        $res = $filename = '';
        
        $product = Product::find($id);
        $filename = $product->image;

        if($request->image){
            $request->validate([
                'image' => ['required', 'mimes:jpg, jpeg'],
            ]);

            $filename = uniqid().'.'.$request->image->extension();
            $out = $request->image->storeAs('images/products', $filename);
            if($out){
                unlink(public_path('images/products/').$product->image);
            }
        }

        $res = $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category,
            'stock_status' => $request->stock_status,
            'image' => $filename,
        ]);

        if($res){
            return redirect()->route('product.index')->with('message', 'Product updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $filename = $product->image;
        if($product->delete()){
            unlink(public_path('images/products/').$product->image);
            return redirect()->route('product.index')->with('message', 'Product deleted successfully.');
        }
    }
}
