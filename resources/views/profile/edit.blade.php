@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="page-header">
        <h1 class="h2 mb-1">Profil</h1>
        <p class="text-secondary mb-0">Perbarui informasi dan keamanan akun Anda.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <section class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h5">Informasi profil</h2>
                    <p class="text-secondary small">Perbarui nama dan alamat email akun.</p>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan profil</button>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h5">Ubah kata sandi</h2>
                    <p class="text-secondary small">Gunakan kata sandi yang kuat untuk melindungi akun.</p>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Kata sandi saat ini</label>
                            <input id="current_password" name="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" required autocomplete="current-password">
                            @error('current_password', 'updatePassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata sandi baru</label>
                            <input id="password" name="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" required autocomplete="new-password">
                            @error('password', 'updatePassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi kata sandi baru</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah kata sandi</button>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-12">
            <section class="card border-danger shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h5 text-danger">Hapus akun</h2>
                    <p class="text-secondary">Tindakan ini menghapus akun Anda secara permanen.</p>
                    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Hapus akun Anda secara permanen?')">
                        @csrf
                        @method('DELETE')
                        <div class="row g-2 align-items-end">
                            <div class="col-md-5">
                                <label for="delete_password" class="form-label">Konfirmasi kata sandi</label>
                                <input id="delete_password" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" required autocomplete="current-password">
                                @error('password', 'userDeletion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-danger">Hapus akun</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
