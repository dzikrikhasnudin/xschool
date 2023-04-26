<?php

namespace Database\Seeders;

use App\Models\Courses\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Penalaran Umum',
                'thumbnail' => null,
                'slug' => Str::slug('Penalaran Umum'),
                'status' => "published",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'Pengetahuan dan Pemahaman Umum',
                'thumbnail' => null,
                'slug' => Str::slug('Pengetahuan dan Pemahaman Umum'),
                'status' => "draft",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'Pemahaman Bacaan dan Menulis',
                'thumbnail' => null,
                'slug' => Str::slug('Pemahaman Bacaan dan Menulis'),
                'status' => "published",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name' => 'Pengetahuan Kuantitatif',
                'thumbnail' => null,
                'slug' => Str::slug('Pengetahuan Kuantitatif'),
                'status' => "draft",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        Course::insert($data);
    }
}
