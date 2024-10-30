<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'address' => 'required|string',
            'image_reference' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required|integer',
            'additional_notes' => 'nullable|string',
            'pickup_option' => 'required|in:Delivery,Pickup',
            'delivery_date' => 'required|date',
        ]);

        // Simpan gambar jika ada
        $imagePath = $request->hasFile('image_reference') ? $request->file('image_reference')->store('images', 'public') : null;

        // Buat order baru
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'address' => $request->address,
            'image_reference' => $imagePath,
            'quantity' => $request->quantity,
            'additional_notes' => $request->additional_notes,
            'pickup_option' => $request->pickup_option,
            'delivery_date' => $request->delivery_date,
        ]);

        // Nomor WhatsApp tujuan
        $whatsappNumber = '6287817555827'; // Pastikan nomor diawali dengan kode negara

        // Template pesan WhatsApp
        $message = "Halo, saya ingin memesan:\n" .
                   "Nama: {$order->customer_name}\n" .
                   "Nomor: {$order->customer_phone}\n" .
                   "Alamat: {$order->address}\n" .
                   "Jumlah Buket: {$order->quantity}\n" .
                   "Pengiriman: {$order->pickup_option}\n" .
                   "Tanggal: {$order->delivery_date}\n" .
                   "Catatan: {$order->additional_notes}";

        // Debugging pesan untuk memastikan semuanya terisi
        \Log::info('WhatsApp Message: ' . $message);

        // Encode pesan untuk URL
        $message = urlencode($message);
        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text={$message}";

        // Redirect ke WhatsApp
        return response()->json(['success' => true, 'whatsapp_url' => $whatsappUrl]);
    }
}
