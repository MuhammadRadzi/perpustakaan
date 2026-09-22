<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KategoriController;

// Route::get('/', function () {
//     return view('landing-page');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/buku', [BookController::class, 'index'])->name('buku.index');
Route::get('/buku/tambah', [BookController::class, 'create'])->name('buku.create');
Route::post('/buku', [BookController::class, 'store'])->name('buku.store');
Route::get('/buku/{book}/edit', [BookController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{book}', [BookController::class, 'update'])->name('buku.update');
Route::delete('/buku/{book}', [BookController::class, 'destroy'])->name('buku.destroy');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
