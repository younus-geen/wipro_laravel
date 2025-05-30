<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    public function index()
    {
        dd("bahavan is here");
        return view('products');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'color' => 'nullable|string|max:50',
            'size' => 'nullable|string|max:50',
        ]);
       $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
    }
  
        // Assuming you have a Product model set up
        $products =    Products::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageName,
            'category' => $request->input('category'),
            'color' => $request->input('color'),
            'size' => $request->input('size'),
        ]);
        if ($products) {
            $request->session()->flash('success', 'Product added successfully!');
        } else {
            $request->session()->flash('error', 'Failed to add product.');
        }
//   dd("$request", $request->all(), $imageName);
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    public function display()
    {
        $products = Products::all();
        return view('home', compact('products'));
    }
}
