@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')
    <div class="page-header">
        <p class="text-primary fw-semibold text-uppercase small mb-2">Administrasi</p>
        <h1 class="h2 mb-1">Kelola Role Pengguna</h1>
        <p class="text-secondary mb-0">Tentukan tingkat akses setiap pengguna.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Pengguna</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role saat ini</th>
                        <th scope="col">Ubah role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="fw-semibold">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->join(', ') ?: 'Belum ditetapkan' }}</td>
                            <td>
                                @if (Auth::user()->is($user))
                                    <span class="text-secondary small">Role akun aktif tidak dapat diubah.</span>
                                @else
                                    <form method="POST" action="{{ route('admin.users.role.update', $user) }}" class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')
                                        <label class="visually-hidden" for="role-{{ $user->id }}">Role untuk {{ $user->name }}</label>
                                        <select id="role-{{ $user->id }}" name="role" class="form-select form-select-sm" required>
                                            @foreach ($availableRoles as $role)
                                                <option value="{{ $role }}" @selected($user->hasRole($role))>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="card-footer bg-white">{{ $users->links() }}</div>
        @endif
    </div>
@endsection
