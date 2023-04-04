# TUGAS 6 - Content Management System

## Data Diri
- Nama : Gupron Nurjalil
- Asal : Universitas Wanita Internasional

## Stack yang Dipakai
- Laravel 9
- Bootstrap 5
- Google Fonts
- Font Awesome
- JQuery

## Cara Menjalankan Aplikasi
1. Buka Terminal atau Command Prompt di Komputer
2. Clone repositori dengan perintah: git clone ```https://github.com/Gufron14/tugascrud.git.```
3. Masuk ke direktori repositori dengan perintah ```cd tugascrud```
4. Buat Database MySQL baru di lokal komputer
5. Salin file ```.env.example``` dan beri nama ```.env.``` Isi konfigurasi koneksi database dengan detail koneksi database seperti ```DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, dan DB_PASSWORD.```
6. Jalankan perintah ```composer install``` untuk menginstall dependensi yang dibutuhkan
7. Jalankan perintah ```php artisan migrate``` untuk membuat tabel dan kolom yang dibutuhkan di database
8. Jalankan perintah ```php artisan serve``` untuk memulai server lokal
9. Buka browser dan ketikkan ```localhost:8000``` pada address bar untuk membuka halaman website.

## Perbaikan dan Tambahan
- Fix CRUD Products
- Fix CRUD Category
- Add Upload File
- Add Authentication (Login & Register) + Middleware
- Change Navbar to Header

## Kekurangan
- Belum bisa update foto
- CRUD Carts belum lengkap
- Hanya bisa Register dan Login, tidak dengan Ganti Password
- Pada Web Browser saya icon Edit & Delete tidak muncul, padahal sudah menambahkan link CDN Font Awesome dan tag nya
