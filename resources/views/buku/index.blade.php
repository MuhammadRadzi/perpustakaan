@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Buku</h1>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    <table class="table table-striped table-hover bg-white align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($semuaBuku as $book)
            @php
                $badgeColor = match ($book->category->name ?? '') {
                    'Fiksi' => 'bg-success',
                    'Teknologi' => 'bg-danger',
                    'Pelajaran' => 'bg-warning',
                    default => 'bg-secondary',
                };
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->judul }}</td>
                <td>{{ $book->penulis }}</td>
                <td><span class="badge rounded-pill {{ $badgeColor }}">{{ $book->category->name ?? '-' }}</span></td>
                <td>{{ $book->tahun }}</td>
                <td>{{ $book->stok }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data buku.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <p class="text-muted">Jumlah: {{$semuaBuku->count()}}</p>
</div>
@endsection
