@extends('layouts.guest')

@section('title', 'Reset kata sandi')

@section('content')
    <h1 class="h3 mb-2">Lupa kata sandi?</h1>
    <p class="text-secondary mb-4">Masukkan email dan kami akan mengirim tautan untuk mengatur ulang kata sandi.</p>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Kirim tautan reset</button>
    </form>
@endsection
