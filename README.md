# PBW MVC Task Planner

Aplikasi Task Planner berbasis Laravel untuk mata kuliah Pemrograman Berbasis Web dengan penerapan MVC dan Eloquent ORM.

## Fitur
- Tambah tugas
- Edit tugas
- Hapus tugas
- Ubah status tugas
- Tambah kategori mata kuliah
- Relasi tugas dan kategori menggunakan Eloquent ORM

## Teknologi
- Laravel
- PHP
- MySQL
- Bootstrap
- CSS

## Struktur MVC

### Model
- app/Models/Task.php
- app/Models/Category.php

### View
- resources/views/tasks/index.blade.php
- resources/views/tasks/edit.blade.php

### Controller
- app/Http/Controllers/TaskController.php

### Route
- routes/web.php

## Method Eloquent
- create()
- find()
- where()
- update()
- delete()

## Cara Menjalankan
1. Jalankan Laragon/XAMPP
2. Import database `task_planner.sql`
3. Atur file `.env`
4. Jalankan:

```bash
php artisan serve
