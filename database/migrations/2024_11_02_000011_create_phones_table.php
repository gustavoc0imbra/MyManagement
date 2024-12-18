<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->morphs('phoneable');
            $table->string('ddd', 2);
            $table->string('phone', 9);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
