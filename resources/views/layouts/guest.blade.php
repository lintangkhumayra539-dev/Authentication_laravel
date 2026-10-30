<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi') - {{ config('app.name', 'Manajemen Buku') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-vh-100 d-flex align-items-center py-5">
    <main class="container">
        <div class="auth-card card border-0 shadow-sm mx-auto">
            <div class="card-body p-4 p-md-5">
                <a class="navbar-brand text-primary text-decoration-none d-inline-block mb-4" href="{{ route('welcome') }}">Manajemen Buku</a>
                @yield('content')
            </div>
        </div>
        <p class="text-center text-secondary small mt-4 mb-0">Kelola koleksi buku dengan mudah dan teratur.</p>
    </main>
</body>
</html>
