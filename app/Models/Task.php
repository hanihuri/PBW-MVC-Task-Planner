<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'category_id',
        'judul_tugas',
        'deadline',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}