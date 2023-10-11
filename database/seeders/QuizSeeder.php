<?php

namespace Database\Seeders;

use App\Models\Courses\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'course_id' => '1',
                'soal' => "Soal 1",
                'pertanyaan' => "Pertanyaan 1",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 2",
                'pertanyaan' => "Pertanyaan 2",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "2",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 3",
                'pertanyaan' => "Pertanyaan 3",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "3",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 4",
                'pertanyaan' => "Pertanyaan 4",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "4",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 5",
                'pertanyaan' => "Pertanyaan 5",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "5",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 6",
                'pertanyaan' => "Pertanyaan 6",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "1",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 7",
                'pertanyaan' => "Pertanyaan 7",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "2",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 8",
                'pertanyaan' => "Pertanyaan 8",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "3",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 9",
                'pertanyaan' => "Pertanyaan 9",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "4",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'course_id' => '1',
                'soal' => "Soal 10",
                'pertanyaan' => "Pertanyaan 10",
                'pilihan_a' => "1",
                'pilihan_b' => "2",
                'pilihan_c' => "3",
                'pilihan_d' => "4",
                'pilihan_e' => "5",
                'jawaban' => "5",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];

        Quiz::insert($data);
    }
}
