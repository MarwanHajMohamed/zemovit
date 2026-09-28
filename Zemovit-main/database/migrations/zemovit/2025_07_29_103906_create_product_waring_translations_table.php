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
        Schema::create('product_waring_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_warning_id');
            $table->string('title');
            $table->string('locale')->index();
            $table->unique(['product_warning_id', 'locale']);
            $table->foreign('product_warning_id')->references('id')->on('product_warnings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_warring_translations');
    }
};
