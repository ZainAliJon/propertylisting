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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->nullable()->constrained('buildings')->onDelete('cascade')->onUpdate('cascade');
            $table->string('unit_number');
            $table->string('size');
            $table->string('gross_rate_per_square');
            $table->string('total_price');
            $table->string('condition');
            $table->string('available_date');
            $table->string('floor_plan_images');
            $table->string('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
