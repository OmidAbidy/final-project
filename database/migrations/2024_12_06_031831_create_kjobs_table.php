<?php

use GuzzleHttp\Client;
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
        Schema::create('kjobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('title');
            $table->text('description');
            $table->float('budget');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('k_users')->onDelete('cascade');
            $table->string('status');  //open or inprogress or finished
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kjobs');
    }
};
