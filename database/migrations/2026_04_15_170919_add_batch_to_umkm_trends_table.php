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
        Schema::table('umkm_trends', function (Blueprint $table) {
            $table->string('batch_name')->nullable()->after('id');
            $table->boolean('is_latest')->default(true)->after('batch_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm_trends', function (Blueprint $table) {
            $table->dropColumn(['batch_name', 'is_latest']);
        });
    }
};
