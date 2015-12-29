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
        $role   = $this->roles->update($data);

        $this->user->roles()->sync($request->input('roles'));

        return $event->fire(new WasUpdated($this->user));
    }

    protected function updateUser()
    {
        $input      = $this->request->input('user');
        $password   = $input['password'];
        //helper function untuk remove beberapa key dari array
        array_forget($input,['password', 'password_confirmation']);

        $user = $this->user->update($input);

        if(empty($password) == false)
        {
            $this->user->password = $password;
            $this->user->save();
        }
        return $user;
    }

    protected function updateDetail()
    {
        if($this->user->detail instanceof UserDetail)
        {
            $this->user->detail->update($request->input('detail'));
        } else{
            //jika user tidak memiliki user detail -> create user detail
            $detail = $request->input('detail');

            //tambah user_id
            $detail['user_id'] = $this->user->id;

            //create baru
            UserDetail::create($detail);
        }

        return $detail;
    }
}
