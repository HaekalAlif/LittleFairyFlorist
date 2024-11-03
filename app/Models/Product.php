<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi melalui mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
    ];

    /**
     * Menentukan apakah kolom `created_at` dan `updated_at` akan digunakan.
     *
     * @var bool
     */
    public $timestamps = true;
}
