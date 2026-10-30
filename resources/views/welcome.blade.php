@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
    <div class="text-center py-3">
        <span class="badge text-bg-primary mb-3">Perpustakaan digital</span>
        <h1 class="display-6 fw-bold mb-3">Manajemen Buku</h1>
        <p class="text-secondary mb-4">Temukan dan kelola koleksi buku kampus dalam satu tempat.</p>
        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary px-4">Buka dashboard</a>
        @else
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('login') }}" class="btn btn-primary px-4">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary px-4">Daftar</a>
            </div>
        @endauth
    </div>
@endsection
