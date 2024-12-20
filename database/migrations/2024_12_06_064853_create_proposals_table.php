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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('proposal_id');
            $table->foreignId('user_id')->references("user_id")->on('k_users')->onDelete('cascade');
            $table->foreignId('job_id')->references('job_id')->on('kjobs')->onDelete('cascade');
            $table->string('status');  //pending or accepted or rejected
            $table->float('proposed_budget');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
