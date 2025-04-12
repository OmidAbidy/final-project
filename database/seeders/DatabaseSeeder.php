<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\ClientJob::factory(10)->create();

        $this->call(CategorySeeder::class); // Add this line
        $this->call([
            ProposalSeeder::class,
        ]);
        $this->call([
            FreelancerProfileSeeder::class,
        ]);
    }
}
