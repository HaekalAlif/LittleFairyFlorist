<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function store(Request $request)
    { 
        // Validasi data request
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

        // Menyimpan gambar jika ada
        $imagePath = $request->hasFile('image_reference') 
            ? $request->file('image_reference')->store('images/orders', 'public') 
            : null;

        // Membuat order baru
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
        $whatsappNumber = '6287817555827'; 

        // Template pesan WhatsApp
        $message = "Halo, terima kasih telah memilih LittleFairyFlorist! 🌸\n\n" . 
                "Berikut detail pesanan saya:\n" . 
                "Nama: {$order->customer_name}\n" . 
                "Nomor Telepon: {$order->customer_phone}\n" . 
                "Alamat Pengiriman: {$order->address}\n" . 
                "Jumlah Buket yang Dipesan: {$order->quantity}\n" . 
                "Metode Pengiriman: {$order->pickup_option}\n" . 
                "Tanggal Pengiriman: {$order->delivery_date}\n" . 
                "Catatan Tambahan: {$order->additional_notes}\n\n" . 
                "Mohon ditunggu ya, admin kami akan segera merespon pesan Anda. 😊 Kami sangat senang bisa membantu Anda membuat momen spesial semakin indah dengan LittleFairyFlorist. 🌼";


        // Encode pesan untuk URL
        $message = urlencode($message);
        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text={$message}";

        // Kembalikan JSON dengan URL WhatsApp
        return response()->json(['success' => true, 'whatsapp_url' => $whatsappUrl]);
    }

    // Menampilkan daftar orders
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    // Mengupdate status order
    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan status valid
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return response()->json(['message' => 'Order status updated successfully.']);
    }


    // Menghapus order
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id); // Pastikan pesanan ditemukan
            $order->delete();

            return response()->json([
                'message' => 'Order deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete order',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getLatestOrders()
    {
        $orders = Order::latest()->take(5)->get(); // Ambil 5 pesanan terbaru
        return response()->json($orders);
    }
}
