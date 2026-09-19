<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
