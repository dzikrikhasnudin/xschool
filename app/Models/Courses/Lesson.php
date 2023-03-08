<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'lessons';
    protected $fillable = [
        'name', 'video', 'chapter_id'
    ];
}
