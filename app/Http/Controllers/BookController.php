<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->orderBy('judul')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Buku',
            'data' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'stok' => 'required|integer|min:0',
        ]);

        $book = Book::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('category');
        return response()->json([
            'success' => true,
            'message' => 'Detail Buku',
            'data' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'exists:categories,id',
            'judul' => 'string|max:255',
            'penulis' => 'string|max:255',
            'penerbit' => 'string|max:255',
            'tahun' => 'integer',
            'stok' => 'integer|min:0',
        ]);

        $book->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil diubah',
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil dihapus'
        ]);
    }
}
