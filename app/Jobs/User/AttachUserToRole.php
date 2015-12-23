<?php

namespace App\Jobs\User;

use App\Events\User\UserWasAttached;
use App\Jobs\Job;
use App\Role;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

class AttachUserToRole extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $this->user->roles()->attach($this->role->id);

        $event->fire(new UserWasAttached($this->user));
    }
}