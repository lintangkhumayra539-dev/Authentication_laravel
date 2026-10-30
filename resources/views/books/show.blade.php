@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-end gap-3">
        <div>
            <a href="{{ route('books.index') }}" class="text-decoration-none small">&larr; Kembali ke daftar buku</a>
            <p class="text-primary fw-semibold text-uppercase small mt-3 mb-2">Detail buku</p>
            <h1 class="h2 mb-1">{{ $book->title }}</h1>
            <p class="text-secondary mb-0">Oleh {{ $book->author }}</p>
        </div>
        @can('edit books')
            <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit buku</a>
        @endcan
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <dl class="row mb-0">
                <dt class="col-sm-3 text-secondary">Penulis</dt><dd class="col-sm-9">{{ $book->author }}</dd>
                <dt class="col-sm-3 text-secondary">Penerbit</dt><dd class="col-sm-9">{{ $book->publisher }}</dd>
                <dt class="col-sm-3 text-secondary">Tahun terbit</dt><dd class="col-sm-9">{{ $book->published_year }}</dd>
                <dt class="col-sm-3 text-secondary">Stok tersedia</dt><dd class="col-sm-9 mb-0">{{ $book->stock }}</dd>
            </dl>
        </div>
    </div>
@endsection
