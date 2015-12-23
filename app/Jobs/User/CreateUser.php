<?php

namespace App\Jobs\User;

use App\Events\User\WasCreated;
use App\Jobs\Job;
use App\Role;
use App\User;
use App\UserDetail;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;

class CreateUser extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    protected $inputs;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->inputs = $this->sanitize();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $user = User::create($this->inputs['user']);
        $detail = $this->inputs['detail'];
        $detail['user_id'] = $user->id;
        $user_detail = UserDetail::create($detail);

        //set default role
        $role = Role::firstOrCreate([
            'name' => 'Guest'
        ]);

        $roles = $this->request->input('roles', []);

         //menghilangkan rolenya untuk mendapatkan nilai string null
        $key = array_search('0', $roles);
        if ($key !== null) unset($roles[$key]);

        $roles = (count($roles) < 1) ? [ $role->id ] : $roles;
        $user->roles()->sync($roles);

        $event->fire(new WasCreated($user, $user_detail));
    }

    protected function sanitize()
    {
        $detail = $this->request->input('detail');

        $inputs['user'] = $this->request->input('user');
        $inputs['detail'] = $detail;

        return $inputs;
    }
}
