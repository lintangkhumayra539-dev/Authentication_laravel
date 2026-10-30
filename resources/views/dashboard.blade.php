@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <p class="text-primary fw-semibold text-uppercase small mb-2">Ringkasan</p>
        <h1 class="h2 mb-1">Dashboard</h1>
        <p class="text-secondary mb-0">Selamat datang, {{ Auth::user()->name }}.</p>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="text-secondary mb-2">Koleksi buku</p>
                    <p class="display-6 fw-semibold mb-3">{{ number_format($bookCount) }}</p>
                    @can('view books')
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Lihat buku</a>
                    @endcan
                </div>
            </div>
        </div>
        @can('manage users')
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <p class="text-secondary mb-2">Pengguna terdaftar</p>
                        <p class="display-6 fw-semibold mb-3">{{ number_format($userCount) }}</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary">Kelola role pengguna</a>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
