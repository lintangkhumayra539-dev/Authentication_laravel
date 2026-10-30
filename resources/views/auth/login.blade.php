@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')
    <h1 class="h3 mb-1">Selamat datang kembali</h1>
    <p class="text-secondary mb-4">Masuk untuk mengakses koleksi buku.</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Kata sandi</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-check mb-4">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">Ingat saya</label>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('password.request') }}" class="small">Lupa kata sandi?</a>
            <button type="submit" class="btn btn-primary px-4">Masuk</button>
        </div>
    </form>
    <p class="text-center text-secondary mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
@endsection
