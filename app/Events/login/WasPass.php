<?php

namespace App\Events\login;

use App\Events\Event;
use App\Jobs;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class WasPass extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $username;
    public function __construct(Username $username)
    {
        $this->username = $username;
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
