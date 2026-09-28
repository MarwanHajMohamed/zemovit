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
        Schema::create('why_choose_us_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('why_choose_us_id');
            $table->string('title');
            $table->text('description');
            $table->string('locale')->index();
            $table->unique(['why_choose_us_id', 'locale']);
            $table->foreign('why_choose_us_id')->references('id')->on('why_choose_us')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_translation');
    }
};
