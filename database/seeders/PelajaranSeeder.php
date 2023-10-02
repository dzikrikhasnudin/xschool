<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pelajaran' => 'Agama',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'PKN',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Bahasa Indonesia',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Bahasa Inggris',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Matematika',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Sejarah Wajib',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Seni Budaya',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Olahraga',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Kewirausahaan',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Fisika',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Kimia',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Biologi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Ekonomi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Bahasa Asing',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Sejarah',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Geografi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'pelajaran' => 'Sosiologi',
                "created_at" => now(),
                "updated_at" => now()
            ],

        ];

        MataPelajaran::insert($data);
    }
}
