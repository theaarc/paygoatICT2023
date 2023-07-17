<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = $user->products()->latest()->get();

        return view('product', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $imageUrl = Storage::url($imagePath);

        $user = Auth::user();
        $user->products()->create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'image' => $imageUrl,
            'price' => $request->input('price'),
        ]);

        return redirect()->route('products')->with('success', 'Product added successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }
    // Implement the edit, update, show, and destroy methods
}
