<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('messages', function (Blueprint $table) {
        // Hapus kolom lama jika ada
        // $table->dropColumn(['sender', 'receiver', 'message']);

        // Tambahkan kolom baru yang lebih terstruktur
        $table->unsignedBigInteger('sender_id');
        $table->string('sender_type'); // 'user' atau 'doctor'
        $table->unsignedBigInteger('receiver_id');
        $table->string('receiver_type'); // 'user' atau 'doctor'
        $table->text('content');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
        // Hapus kolom lama jika ada
        // $table->dropColumn(['sender', 'receiver', 'message']);

        // Tambahkan kolom baru yang lebih terstruktur
        $table->unsignedBigInteger('sender_id');
        $table->string('sender_type'); // 'user' atau 'doctor'
        $table->unsignedBigInteger('receiver_id');
        $table->string('receiver_type'); // 'user' atau 'doctor'
        $table->text('content');
    });
    }
};
