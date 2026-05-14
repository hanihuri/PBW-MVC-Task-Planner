# PBW MVC Task Planner

Project ini merupakan implementasi konsep MVC menggunakan framework Laravel untuk mata kuliah Pemrograman Berbasis Web.

## Fitur
- Menampilkan daftar tugas kuliah
- Menambahkan tugas baru
- Mengubah status tugas menjadi selesai
- Menampilkan tugas berdasarkan status belum selesai dan selesai
- Menggunakan koneksi database MySQL

## Teknologi
- Laravel
- PHP
- MySQL
- Bootstrap
- CSS

## Struktur MVC
- Model: `app/Models/Task.php`
- View: `resources/views/tasks/index.blade.php`
- Controller: `app/Http/Controllers/TaskController.php`
- Route: `routes/web.php`

## Cara Menjalankan

1. Jalankan Laragon.
2. Import database `task_planner.sql`.
3. Atur file `.env`.
4. Jalankan command berikut:

```bash
php artisan serve
```