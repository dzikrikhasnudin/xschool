<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    // use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'mata_pelajaran';
    protected $fillable = [
        'pelajaran'
    ];

    public function nilai()
    {
        return $this->hasMany(NilaiRapor::class)->orderBy('semester', 'ASC');
    }
}
