<?php

namespace App\Jobs\User;

use App\Events\User\WasUpdated;
use App\Jobs\Job;
use App\Role;
use App\User;
use App\UserDetail;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;

class UpdateUser extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $detail;
    protected $role;
    protected $request;

    public function __construct(User $user, Request $request, UserDetail $detail, Role $role)
    {
        $this->user = $user;
        $this->request = $request;
        $this->roles = $role;
        $this->detail = $detail;
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

        $data   = $this->request->input('roles', []);
        $role  = $this->roles->update($data);

        $this->roles()->sync($role);

        return $event->fire(new WasUpdated($this->user));
    }

    protected function updateUser()
    {
        $data = $this->request->input('user');

        $user = $this->user->update($data);

        return $user;
    }

    protected function updateDetail()
    {
        $data = $this->request->input('detail');

        $detail = $this->detail->update($data);

        return $detail;
    }
}
