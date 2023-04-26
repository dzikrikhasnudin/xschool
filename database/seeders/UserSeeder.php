<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dzikri Khasnudin',
                'username' => 'dzikri.khasnudin',
                'email' => 'dzikri.khasnudin2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => 'CKtNykWjOcGobSN2FODM4xeLhRjTDC6ABAN0Wgg95XKzrhDLpeITYlaWMsKh',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        User::insert($data);
    }
}
