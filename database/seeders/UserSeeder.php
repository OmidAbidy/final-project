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
            'profile_picture' => 'images/1.jpg',
        ]);
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'role' => 'freelancer', // Adjust based on your ENUM values
            'profile_picture' => 'images/0.jpeg', // Adjust as needed
        ]);

    }
}
