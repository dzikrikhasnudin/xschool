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
                'nama' => 'Agama',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'PKN',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Bahasa Indonesia',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Bahasa Inggris',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Matematika',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Sejarah Wajib',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Seni Budaya',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Olahraga',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Kewirausahaan',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Fisika',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Kimia',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Biologi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Matematika IPA',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Ekonomi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Sejarah',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Geografi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Sosiologi',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'nama' => 'Bahasa Asing',
                "created_at" => now(),
                "updated_at" => now()
            ],

        ];

        MataPelajaran::insert($data);
    }
}
