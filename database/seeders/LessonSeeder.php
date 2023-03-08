<?php

namespace Database\Seeders;

use App\Models\Courses\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Konsep Kilat Kesesuaian Pernyataan',
                'video' => 'https://youtu.be/DYFdJwSYD-Y',
                'chapter_id' => 1
            ],
            [
                'name' => 'Konsep Kilat Penalaran Analitik',
                'video' => 'https://youtu.be/K9GeRKn7oUU',
                'chapter_id' => 2
            ],
            [
                'name' => 'Implikasi dan Biimplikasi',
                'video' => 'https://youtu.be/1xQOMD92McQ',
                'chapter_id' => 3
            ],
            [
                'name' => 'Konjungsi dan Disjungsi',
                'video' => 'https://youtu.be/ZLBDSU8s3QI',
                'chapter_id' => 3
            ]
        ];

        Lesson::insert($data);
    }
}
