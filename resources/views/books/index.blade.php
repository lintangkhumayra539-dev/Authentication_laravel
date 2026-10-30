@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-end gap-3">
        <div>
            <p class="text-primary fw-semibold text-uppercase small mb-2">Koleksi</p>
            <h1 class="h2 mb-1">Daftar Buku</h1>
            <p class="text-secondary mb-0">Cari dan lihat informasi buku yang tersedia.</p>
        </div>
        @can('create books')
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
        @endcan
    </div>

    <form method="GET" action="{{ route('books.index') }}" class="card card-body border-0 shadow-sm mb-3">
        <div class="row g-2">
            <div class="col">
                <label for="search" class="visually-hidden">Cari buku</label>
                <input id="search" type="search" name="search" value="{{ $search }}" class="form-control" placeholder="Cari judul, penulis, atau penerbit">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </div>
            @if ($search !== '')
                <div class="col-auto">
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Hapus pencarian</a>
                </div>
            @endif
        </div>
    </form>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Stok</th>
                        <th scope="col"><span class="visually-hidden">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td class="fw-semibold">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->published_year }}</td>
                            <td>{{ $book->stock }}</td>
                            <td class="text-end text-nowrap">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                                @can('edit books')
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                @endcan
                                @can('delete books')
                                    <form method="POST" action="{{ route('books.destroy', $book) }}" class="d-inline" onsubmit="return confirm('Hapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">Belum ada buku yang cocok dengan pencarian.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($books->hasPages())
            <div class="card-footer bg-white">{{ $books->links() }}</div>
        @endif
    </div>
@endsection
