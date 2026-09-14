<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaBuku = Book::with('category')->orderBy('judul')->get();
        // dd($semuaBuku);
        return view('buku.index', [
            'semuaBuku' => $semuaBuku
        ]);
    }

    public function create()
    {
        $semuaKategori = Category::orderBy('name')->get();
        return view('buku.create', [
            'semuaKategori' => $semuaKategori
        ]);
    }

    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul'       => 'required|string|max:150',
            'penulis'     => 'required|string|max:100',
            'penerbit'    => 'nullable|string|max:100',
            'tahun'       => 'required|integer|min:1900|max:' . date('Y'),
            'stok'        => 'required|integer|min:0',
        ]);

        Book::create($dataValid);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }
}
