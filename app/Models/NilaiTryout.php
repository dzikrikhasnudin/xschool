<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTryout extends Model
{

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'tanggal_pelaksanaan' => 'datetime:Y-m-d'
    ];

    protected $table = 'nilai_tryout';
    protected $fillable = [
        'user_id',
        'batch',
        'subtes_pu',
        'subtes_ppu',
        'subtes_pbm',
        'subtes_pk',
        'subtes_litbindo',
        'subtes_litbing',
        'subtes_pm',
        'rata_rata',
        'jumlah_benar',
        'tanggal_pelaksanaan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
