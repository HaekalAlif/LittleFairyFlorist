<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari default (orders)
    protected $table = 'orders';

    // Menentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'address',
        'image_reference',
        'additional_notes',
        'quantity',
        'delivery_date',
        'pickup_option',
        'status',
    ];

    // Jika Anda ingin menambahkan cara konversi atau relasi, bisa ditambahkan di sini
}
