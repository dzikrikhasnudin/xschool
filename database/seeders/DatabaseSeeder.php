<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            // UserSeeder::class,
            // CourseSeeder::class,
            // ChapterSeeder::class,
            // LessonSeeder::class,
            // PermissionTableSeeder::class,
            PelajaranSeeder::class
        ]);

        \App\Models\NilaiRapor::factory(16)->create();
    }
}
