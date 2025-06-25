<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aktivitas_dewasa', function (Blueprint $table) {
            $table->id();
            $table->text('hari');
            $table->string('aktivitas_pagi');
            $table->string('aktivitas_sore');
            $table->text('deskripsi_1');
            $table->text('deskripsi_2');
            $table->string('video');
            $table->string('video2');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aktivitas_dewasa');
    }
};
