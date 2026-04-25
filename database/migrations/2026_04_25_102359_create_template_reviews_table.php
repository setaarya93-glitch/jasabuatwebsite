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
        Schema::create('template_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('templates')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('rating'); // 1-5 stars
            $table->text('comment');
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_reviews');
    }
};
