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
        Schema::create('product_benefit_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_benefit_id');
            $table->string('title');
            $table->string('locale')->index();
            $table->unique(['product_benefit_id', 'locale']);
            $table->foreign('product_benefit_id')->references('id')->on('product_benefits')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_benfite_translations');
    }
};
