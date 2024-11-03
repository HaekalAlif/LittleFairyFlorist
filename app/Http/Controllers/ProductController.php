<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Method untuk menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Method untuk menyimpan produk baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan untuk gambar
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Proses unggahan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image_url = 'storage/' . $imagePath;
        }

        $product->save();

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // Method untuk memperbarui data produk
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Proses pembaruan gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image_url) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->image_url));
            }

            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image_url = 'storage/' . $imagePath;
        }

        $product->save();

        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }

    // Method untuk menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar produk jika ada
        if ($product->image_url) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->image_url));
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    // Method untuk menampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

}
