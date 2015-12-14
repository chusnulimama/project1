<?php

namespace App\Events\User;

use App\Events\Event;
use App\User;
use App\UserDetail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WasCreated extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
//    public $detail;
    public function __construct(User $user)
    {
        $this->user     = $user;
//        $this->detail   = $detail;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
