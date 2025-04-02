<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClientJob;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientJob>
 */
class ClientJobFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
             'client_id' => User::where('role', 'client')->inRandomOrder()->first()->id 
                ?? User::factory()->create(['role' => 'client'])->id,
            'categorie_id' => Category::inRandomOrder()->first()->id 
                ?? Category::factory()->create()->id, // Ensure category_id exists
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(),
            'budget_type' => $this->faker->randomElement(['fixed', 'hourly']),
            'budget_amount' => $this->faker->randomFloat(2, 100, 10000),
            'is_negotiable' => $this->faker->boolean(),
            'application_deadline' => now()->addDays(rand(5, 30)),
            'project_deadline' => now()->addMonths(rand(1, 6)),
            'status' => $this->faker->randomElement(['open']), //'in_progress', 'completed', 'cancelled' later also add them
            'visibility' => $this->faker->randomElement(['public']), //, 'invite_only' ,private later also add them
            'location' => $this->faker->randomElement(['Remote', 'On-Site', 'Hybrid']),
            'experience_level' => $this->faker->randomElement(['entry', 'intermediate', 'expert']),
            'payment_method' => $this->faker->randomElement(['escrow', 'milestone', 'on_completion']),
            'hires_needed' => rand(1, 5),
            'terms' => $this->faker->sentence(),
            
        ];
    }
}
