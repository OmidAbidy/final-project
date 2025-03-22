<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('freelancer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('bio')->nullable(); // Bio
            $table->string('skills')->nullable();
            $table->string('experience')->nullable(); // Experience
            $table->string('portfolio_link')->nullable(); // Portfolio link
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->enum('availability', ['available', 'busy', 'offline'])->default('available');
            $table->decimal('rating', 3, 2)->nullable(); // Rating (out of 5)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_profiles');
    }
};
