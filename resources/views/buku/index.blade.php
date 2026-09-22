@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Buku</h1>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    @if (session('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('buku.index') }}" method="get" class="d-flex gap-2 mb-3" style="max-width: 420px">
        <input type="text" name="cari" class="form-control" placeholder="Cari judul atau penulis..." value="{{ $kataKunci ?? '' }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
        @if (!empty($kataKunci))
        <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary">Reset</a>
        @endif
    </form>

    @if (!empty($kataKunci))
    <p>Hasil pencarian "<b>{{ $kataKunci }}</b>": {{ $semuaBuku->count() }} buku ditemukan.</p>
    @endif

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
                    <div class="d-flex gap-1">
                        <a href="{{ route('buku.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $book) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
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