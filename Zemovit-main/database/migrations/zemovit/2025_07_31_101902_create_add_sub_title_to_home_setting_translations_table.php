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
        Schema::table('home_setting_translations', function (Blueprint $table) {
            $table->string('subtitle')->after('title')->nullable();
            $table->string('subtitle2')->after('subtitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_setting_translations', function (Blueprint $table) {
            $table->dropColumn(['subtitle,subtitle2']);
        });
    }
};
