<?php

namespace Database\Seeders;

use App\Models\Courses\Chapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Kesesuaian Pernyataan",
                'course_id' => 1
            ],
            [
                'name' => "Penalaran Analitik",
                'course_id' => 1
            ],
            [
                'name' => "Simpulan Logis",
                'course_id' => 1
            ],
            [
                'name' => "Penalaran Kuantitatif",
                'course_id' => 1
            ],
            [
                'name' => "Analogi",
                'course_id' => 1
            ],
            [
                'name' => "Bahasa Panda & Kriptografi (Materi Tambahan)",
                'course_id' => 1
            ]
        ];

        Chapter::insert($data);
    }
}
