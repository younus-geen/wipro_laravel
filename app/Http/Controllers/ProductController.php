<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    public function index()
    {
        return view('products');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'color' => 'nullable|string|max:50',
            'size' => 'nullable|string|max:50',
        ]);

        // Assuming you have a Product model set up
            Products::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $request->file('image')->store('images', 'public'), // Store image in public/images
            'category' => $request->input('category'),
            'color' => $request->input('color'),
            'size' => $request->input('size'),
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }
}
