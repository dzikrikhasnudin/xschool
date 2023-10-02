<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiRapor extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s'
    ];

    protected $table = 'nilai_rapor';
    protected $fillable = [
        'user_id', 'pelajaran_id', 'nilai', 'semester'
    ];

    public function pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
