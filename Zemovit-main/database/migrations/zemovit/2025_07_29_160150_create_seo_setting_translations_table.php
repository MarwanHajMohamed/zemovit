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
        Schema::create('seo_setting_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seo_setting_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
            $table->text('keywords');
            $table->unique(['locale', 'seo_setting_id']);
            $table->foreign('seo_setting_id')->references('id')->on('seo_settings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_setting_translations');
    }
};
