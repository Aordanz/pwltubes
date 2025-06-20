<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aktivitas_lansia', function (Blueprint $table) {
            $table->id();
            $table->integer('hari');
            $table->string('aktivitas_pagi')->nullable();
            $table->string('aktivitas_sore')->nullable();
            $table->text('deskripsi_1')->nullable();
            $table->text('deskripsi_2')->nullable();
            $table->string('video')->nullable();
            $table->string('video2')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aktivitas_lansia');
    }
};
