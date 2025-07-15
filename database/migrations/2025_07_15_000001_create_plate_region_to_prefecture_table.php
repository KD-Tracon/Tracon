<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plate_region_to_prefecture', function (Blueprint $table) {
            $table->id();
            $table->string('region_name')->unique();
            $table->string('prefecture_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plate_region_to_prefecture');
    }
};
