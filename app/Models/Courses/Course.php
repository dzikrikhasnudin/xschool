<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'courses';
    protected $fillable = [
        'name', 'thumbnail', 'status'
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('id', 'ASC');
    }

    public function images()
    {
        return $this->hasMany(ImageCourse::class)->orderBy('id', 'DESC');
    }
}
