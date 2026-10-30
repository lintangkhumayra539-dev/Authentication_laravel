@extends('layouts.guest')

@section('title', 'Verifikasi email')

@section('content')
    <h1 class="h3 mb-2">Verifikasi email</h1>
    <p class="text-secondary mb-3">Terima kasih telah mendaftar. Jika email verifikasi belum diterima, kirim ulang melalui tombol di bawah.</p>
    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">Tautan verifikasi baru telah dikirim ke alamat email Anda.</div>
    @endif
    <div class="d-flex flex-wrap gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Kirim ulang email verifikasi</button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary">Keluar</button>
        </form>
    </div>
@endsection
