<?php

namespace Database\Seeders;

use App\Models\NilaiRapor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'pelajaran_id' => random_int(1, 16),
                'nilai' => random_int(75, 100),
                'semester' => random_int(1, 6),
                "created_at" => now(),
                "updated_at" => now()
            ],

        ];

        NilaiRapor::insert($data);
    }
}
