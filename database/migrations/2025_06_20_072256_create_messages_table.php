<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // Polymorphic sender
            $table->unsignedBigInteger('sender_id');
            $table->string('sender_type');

            // Polymorphic receiver
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_type');

            // Message content
            $table->text('content');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
