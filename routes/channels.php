<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{userId}.{doctorId}', function ($user, $userId, $doctorId) {
    // Pastikan user yang login adalah user atau dokter yang terlibat dalam chat
    return $user->id == $userId || $user->id == $doctorId;

});
