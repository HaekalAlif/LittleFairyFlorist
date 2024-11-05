<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        // Mengambil semua data testimonial dari database
        $testimonials = Testimonial::all();

        return response()->json($testimonials);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $testimonial = new Testimonial();
        $testimonial->customer_name = $request->customer_name;
        $testimonial->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/testimonials', 'public');
            $testimonial->image_url = $path;
        }

        $testimonial->save();

        return response()->json(['message' => 'Testimonial created successfully.']);
    }

    public function show($id)
    {
        return Testimonial::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->customer_name = $request->customer_name;
        $testimonial->description = $request->description;

        if ($request->hasFile('image')) {
            // Hapus gambar yang lama jika ada
            if ($testimonial->image_url) {
                Storage::disk('public')->delete($testimonial->image_url);
            }

            $path = $request->file('image')->store('images/testimonials', 'public');
            $testimonial->image_url = $path;
        }

        $testimonial->save();

        return response()->json(['message' => 'Testimonial updated successfully.']);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->image_url) {
            Storage::disk('public')->delete($testimonial->image_url);
        }
        $testimonial->delete();

        return response()->json(['message' => 'Testimonial deleted successfully.']);
    }
}
