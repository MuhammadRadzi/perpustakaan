<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'stok'
    ];

    // Relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
