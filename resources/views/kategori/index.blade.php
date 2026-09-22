@extends('layouts.app')
@section('title', 'Kategori')
@section('content')
<h1 class="mb-3">Kategori Buku</h1>
<div class="row">
    @foreach ($semuaKategori as $kategori)
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $kategori->name }}</h5>
                <p class="card-text text-muted">
                    {{ $kategori->books_count }} buku dalam kategori ini
                </p>
                <a href="{{ route('buku.index', ['cari' => '']) }}" class="btn btn-sm btn-outline-primary">
                    Lihat Buku
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
