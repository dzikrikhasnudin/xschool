<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiRapor>
 */
class NilaiRaporFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'pelajaran_id' => random_int(1, 16),
            'nilai' => random_int(75, 100),
            'semester' => random_int(1, 6),
            "created_at" => now(),
            "updated_at" => now()
        ];
    }
}
