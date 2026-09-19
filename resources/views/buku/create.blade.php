@extends('layouts.app')
@section('title', 'Tambah Buku')
@section('content')
<h1 class="mb-3">Tambah Buku</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <b>Periksa lagi isianmu:</b>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('buku.store') }}" method="post" class="card p-4 bg-white" style="max-width: 560px">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul Buku</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Penerbit <small class="text-muted">(boleh kosong)</small></label>
        <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit') }}">
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($semuaKategori as $kategori)
            <option value="{{ $kategori->id }}" @if (old('category_id') == $kategori->id) selected @endif>
                {{ $kategori->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
</form>
@endsection
