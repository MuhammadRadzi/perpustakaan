<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $semuaKategori = Category::withCount('books')->orderBy('name')->get();
        return view('kategori.index', ['semuaKategori' => $semuaKategori]);
    }
}
