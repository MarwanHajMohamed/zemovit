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
        Schema::create('therapeutic_area_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('therapeutic_area_id');
            $table->string('title');
            $table->string('title2')->nullable();
            $table->text('description');
            $table->string('locale')->index();
            $table->unique(['locale', 'therapeutic_area_id']);
            $table->foreign('therapeutic_area_id')->references('id')->on('therapeutic_areas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapeutic_area_translations');
    }
};
