<?php

namespace App\Jobs\User;

use App\Events\User\WasUpdated;
use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Request;

class UpdateUser extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $request;

    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $this->updateUser();
        $this->updateDetail();
        $this->roles()->sync(roles);

        return $event->fire(new WasUpdated($this->user, $this->detail, $this->role));
    }
}
