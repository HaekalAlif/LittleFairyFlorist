<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Activity;
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
        // Validasi data request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan untuk gambar
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Membuat objek produk baru
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // Proses unggahan gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image_url = 'storage/' . $imagePath;
        }

        // Menyimpan produk ke database
        $product->save();

        

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // Method untuk memperbarui data produk
    public function update(Request $request, $id)
    {
        // Validasi data request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Menemukan produk yang akan diupdate
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

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image_url = 'storage/' . $imagePath;
        }

        // Menyimpan pembaruan produk ke database
        $product->save();

       

        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }

    // Method untuk menghapus produk
    public function destroy($id)
    {
        // Menemukan produk yang akan dihapus
        $product = Product::findOrFail($id);

        // Hapus gambar produk jika ada
        if ($product->image_url) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->image_url));
        }

        // Menghapus produk dari database
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    // Method untuk menampilkan detail produk
    public function show($id)
    {
        // Menemukan produk berdasarkan ID
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    
}
