<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
// Pastikan path ke model Anda benar. Jika Anda belum punya model, Anda perlu membuatnya.
// Contoh: App\Models\Message atau App\Models\ChatMessage
use App\Models\ChatMessage; 

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Pesan yang akan disiarkan.
     *
     * @var \App\Models\ChatMessage
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\ChatMessage $message
     * @return void
     */
    public function __construct(ChatMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Channel privat ini memastikan hanya pengguna dan dokter yang terlibat yang bisa mendengarkan.
        // Formatnya akan menjadi 'chat.{userId}.{doctorId}'
        $user_id = $this->message->sender_type === 'user' ? $this->message->sender_id : $this->message->receiver_id;
        $doctor_id = $this->message->sender_type === 'doctor' ? $this->message->sender_id : $this->message->receiver_id;

        return new PrivateChannel('chat.' . $user_id . '.' . $doctor_id);
    }

    /**
     * Nama custom untuk event yang akan disiarkan.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'chat-message';
    }
}