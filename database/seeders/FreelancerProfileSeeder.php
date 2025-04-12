<?php

namespace Database\Seeders;

use App\Models\FreelancerProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class FreelancerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you already have users, otherwise create users first.
        $users = User::where('role', 'freelancer')->get();

        foreach ($users as $user) {
            FreelancerProfile::create([
                'user_id' => $user->id,
                'skills' => implode(', ', $faker->words(3)), // Example: "Laravel, React, PHP"
                'hourly_rate' => $faker->randomFloat(2, 10, 100), // Random rate between $10 and $100
                'rating' => $faker->randomFloat(1, 3, 5), // Rating between 3 and 5
                'availability' => $faker->randomElement(['available', 'busy', 'offline']),
                'bio' => $faker->sentence(10),
                'experience' => $faker->numberBetween(1, 10) . ' years',
                'portfolio_link' => $faker->url,
            ]);
    }
}
}
