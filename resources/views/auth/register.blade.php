@extends('layouts.guest')

@section('title', 'Daftar')

@section('content')
    <h1 class="h3 mb-1">Buat akun</h1>
    <p class="text-secondary mb-4">Akun baru akan memiliki akses sebagai Mahasiswa.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Kata sandi</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Konfirmasi kata sandi</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('login') }}" class="small">Sudah punya akun?</a>
            <button type="submit" class="btn btn-primary px-4">Daftar</button>
        </div>
    </form>
@endsection
