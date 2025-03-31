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
        Schema::table('client_jobs', function (Blueprint $table) {
            $table->foreign(['categorie_id'])->references(['id'])->on('categories')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['client_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_jobs', function (Blueprint $table) {
            $table->dropForeign('client_jobs_categorie_id_foreign');
            $table->dropForeign('client_jobs_client_id_foreign');
        });
    }
};
