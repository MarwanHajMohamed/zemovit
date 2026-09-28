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
Schema::create('vision_translations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('vision_id')->constrained('visions')->onDelete('cascade');
    $table->string('locale')->index();
    $table->string('title')->nullable();
    $table->string('sub_title')->nullable();
    $table->text('description')->nullable();
    $table->timestamps();

    $table->unique(['vision_id', 'locale']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_translations');
    }
};
