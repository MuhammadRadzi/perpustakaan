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
        return view('buku.create', ['semuaKategori' => $semuaKategori]);
    }
    public function store(Request $request)
    {
        $dataValid = $request->validate([
            'judul' => 'required|min:3|max:150',
            'penulis' => 'required|max:100',
            'penerbit' => 'nullable|max:100',
            'tahun' => 'required|integer|min:1901|max:2100',
            'stok' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.min' => 'Judul minimal 3 karakter.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'tahun.required' => 'Tahun terbit wajib diisi.',
            'category_id.required' => 'Pilih salah satu kategori.',
            'category_id.exists' => 'Kategori tidak valid.',
        ]);
        Book::create($dataValid);
        return redirect()
            ->route('buku.index')
            ->with('sukses', 'Buku "' . $dataValid['judul'] . '" berhasil ditambahkan!');
    }
}
