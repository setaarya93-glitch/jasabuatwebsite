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
        Schema::create('umkm_trends', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('trend_name');
            $table->text('description');
            $table->string('growth_percentage');
            $table->string('website_need_score'); // Rendah, Sedang, Tinggi, Sangat Tinggi
            $table->integer('score_value'); // 1 to 100 for sorted visual bar
            $table->string('website_features'); // e.g. "Katalog, Form Booking"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm_trends');
    }
};
