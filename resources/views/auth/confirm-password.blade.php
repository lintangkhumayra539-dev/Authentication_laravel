@extends('layouts.guest')

@section('title', 'Konfirmasi kata sandi')

@section('content')
    <h1 class="h3 mb-2">Konfirmasi identitas</h1>
    <p class="text-secondary mb-4">Masukkan kata sandi untuk melanjutkan ke area aman.</p>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="mb-4">
            <label for="password" class="form-label">Kata sandi</label>
            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Konfirmasi</button>
    </form>
@endsection
