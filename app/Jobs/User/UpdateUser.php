<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

class UpdateUser extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {

    }
}
