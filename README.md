# Manajemen Buku

Aplikasi web untuk mengelola koleksi buku dengan Laravel, Laravel Breeze, Spatie Laravel Permission, MySQL, Blade, dan Bootstrap.

## Fitur

- Registrasi, login, logout, dashboard, dan pengaturan profil.
- CRUD buku: judul, penulis, penerbit, tahun terbit, dan stok.
- Pencarian buku berdasarkan judul, penulis, atau penerbit.
- Pengelolaan role pengguna oleh Admin.

## Hak akses

| Role | Hak akses |
| --- | --- |
| Admin | Melihat, menambah, mengedit, dan menghapus buku; mengubah role pengguna |
| Dosen | Melihat, menambah, dan mengedit buku |
| Mahasiswa | Melihat buku |

Pengguna yang mendaftar melalui halaman registrasi otomatis mendapatkan role Mahasiswa. Role dan permission aplikasi dibuat oleh seeder; jangan membuka registrasi sebagai Admin.

## Menjalankan aplikasi

1. Siapkan PHP 8.3+, Composer, Node.js/npm, dan MySQL. Buat database MySQL bernama `book_management` (atau nama lain yang diatur di `.env`).
2. Pasang dependensi dan siapkan konfigurasi. Jika file `.env` belum ada, salin `.env.example` terlebih dahulu; keduanya menggunakan konfigurasi MySQL.

   ```bash
   composer install
   php artisan key:generate
   npm install
   ```

3. Atur `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`.
4. Untuk membuat akun Admin awal, isi `ADMIN_EMAIL` dan `ADMIN_PASSWORD` di `.env` sebelum menjalankan seeder. Atur juga `ADMIN_NAME` bila diperlukan. Tanpa `ADMIN_PASSWORD`, seeder hanya membuat role dan permission dan tidak membuat akun dengan kata sandi bawaan.
5. Migrasikan database dan buat role, permission, serta Admin awal (jika dikonfigurasi):

   ```bash
   php artisan migrate --seed
   ```

6. Bangun aset dan jalankan aplikasi:

   ```bash
   npm run build
   php artisan serve
   ```

Buka URL yang ditampilkan oleh `php artisan serve`. Kredensial Admin menggunakan nilai `ADMIN_EMAIL` dan `ADMIN_PASSWORD` yang Anda atur sendiri.

## Pengujian

```bash
php artisan test
```

Pengujian menggunakan SQLite in-memory dan tidak memerlukan database MySQL.
