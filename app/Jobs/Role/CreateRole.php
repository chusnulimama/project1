<?php

namespace App\Jobs\Role;

use App\Role;
use App\Jobs\Job;
use App\Events\Role\WasCreated;
use Illuminate\Http\Request;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

class CreateRole extends Job implements SelfHandling
{
    protected $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $role = Role::create($this->request->input('role'));

        $event->fire(new WasCreated($role));
    }
}
