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
        Schema::create('client_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id')->index('client_jobs_client_id_foreign');
            $table->unsignedBigInteger('categorie_id')->index('client_jobs_categorie_id_foreign');
            $table->string('title');
            $table->text('description');
            $table->enum('budget_type', ['fixed', 'hourly']);
            $table->decimal('budget_amount', 10)->nullable();
            $table->boolean('is_negotiable')->default(false);
            $table->timestamp('posted_date')->useCurrent();
            $table->timestamp('application_deadline')->nullable();
            $table->timestamp('project_deadline')->nullable();
            $table->enum('status', ['open', 'in_progress', 'completed', 'cancelled'])->default('open');
            $table->enum('visibility', ['public', 'private', 'invite_only'])->default('public');
            $table->string('location')->default('Remote');
            $table->enum('experience_level', ['entry', 'intermediate', 'expert']);
            $table->enum('payment_method', ['escrow', 'milestone', 'on_completion']);
            $table->integer('hires_needed')->default(1);
            $table->text('terms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_jobs');
    }
};