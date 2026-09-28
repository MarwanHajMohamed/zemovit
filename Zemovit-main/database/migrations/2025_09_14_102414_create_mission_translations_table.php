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
Schema::create('mission_translations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('mission_id')->constrained('missions')->onDelete('cascade');
    $table->string('locale')->index();
    $table->string('title')->nullable();
    $table->string('sub_title')->nullable();
    $table->text('description')->nullable();
    $table->timestamps();

    $table->unique(['mission_id', 'locale']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission_translations');
    }
};
