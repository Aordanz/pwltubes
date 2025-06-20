<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aktivitas_remaja', function (Blueprint $table) {
            $table->id();
            $table->string('aktivitas');
            $table->string('video');
            $table->text('deskripsi');
            $table->string('program');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aktivitas_remaja');
    }
};
