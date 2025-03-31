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

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password123'),
            'role' => 'client',
            'profile_picture' => 'profile_pics/janesmith.jpg',
        ]);
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'role' => 'freelancer', // Adjust based on your ENUM values
            'profile_picture' => 'profile_pics/johndoe.jpg', // Adjust as needed
        ]);

    }
}
