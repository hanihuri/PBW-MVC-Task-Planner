<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'mata_kuliah',
        'judul_tugas',
        'deadline',
        'status'
    ];
}