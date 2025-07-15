<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hiragana_to_usage_type', function (Blueprint $table) {
            $table->id();
            $table->string('hiragana');
            $table->string('usage_type');
            $table->string('vehicle_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hiragana_to_usage_type');
    }
};
