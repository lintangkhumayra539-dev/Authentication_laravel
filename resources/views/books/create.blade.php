@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="page-header">
        <a href="{{ route('books.index') }}" class="text-decoration-none small">&larr; Kembali ke daftar buku</a>
        <h1 class="h2 mt-2 mb-1">Tambah Buku</h1>
        <p class="text-secondary mb-0">Lengkapi informasi buku baru.</p>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('books.store') }}">
                @csrf
                @include('books._form')
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan buku</button>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
