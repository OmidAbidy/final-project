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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('freelancer_profiles_user_id_foreign');
            $table->text('bio')->nullable();
            $table->string('skills')->nullable();
            $table->string('experience')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->decimal('hourly_rate')->nullable();
            $table->enum('availability', ['available', 'busy', 'offline'])->default('available');
            $table->decimal('rating', 3)->nullable();
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
