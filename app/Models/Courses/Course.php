<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    // use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'courses';
    protected $fillable = [
        'name', 'slug', 'thumbnail', 'status'
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->orderBy('id', 'ASC');
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('status', '=', 'published');
    }

    public function scopeDraft(Builder $query): void
    {
        $query->where('status', '=', 'draft');
    }
}
