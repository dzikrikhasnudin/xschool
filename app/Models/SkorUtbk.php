<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorUtbk extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'skor_utbk';
    protected $fillable = [
        'program_studi', 'ptn_id', 'skor', 'hasil', 'tahun'
    ];

    public function kampus()
    {
        return $this->belongsTo(College::class, 'ptn_id', 'id');
    }
}
