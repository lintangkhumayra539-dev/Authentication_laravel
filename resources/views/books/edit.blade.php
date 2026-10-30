@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <div class="page-header">
        <a href="{{ route('books.show', $book) }}" class="text-decoration-none small">&larr; Kembali ke detail buku</a>
        <h1 class="h2 mt-2 mb-1">Edit Buku</h1>
        <p class="text-secondary mb-0">Perbarui informasi “{{ $book->title }}”.</p>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('books.update', $book) }}">
                @csrf
                @method('PUT')
                @include('books._form')
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
