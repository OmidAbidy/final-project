<?php

namespace Database\Seeders;

use App\Models\ClientJob;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Get some freelancers
         $freelancers = User::where('role', 'freelancer')->get();

         // Get some client jobs
         $clientJobs = ClientJob::all();
 
         // Loop through and create proposals
         foreach ($clientJobs as $job) {
             // Random freelancers apply to this job
             $applicants = $freelancers->random(rand(1, 3)); // 1 to 3 proposals per job
 
             foreach ($applicants as $freelancer) {
                 Proposal::create([
                     'freelancer_id' => $freelancer->id,
                     'clientjob_id' => $job->id,
                     'bid_amount' => rand(100, 1000),
                     'description' => fake()->paragraph(5),
                     'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
                     'delivery_time' => rand(3, 14) . ' days',
                 ]);
             }
         }
    }
}
