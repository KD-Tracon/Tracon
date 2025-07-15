<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_number_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('start');
            $table->integer('end');
            $table->string('category');
            $table->string('vehicle_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_number_categories');
    }
};
