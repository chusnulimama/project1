<?php

namespace App\Jobs\User;

use App\Events\User\WasCreated;
use App\Jobs\Job;
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
        $this->request  = $request;
        $this->inputs   = $this->sanitize();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $user = User::create($this->inputs['user']);
//        $user_detail = UserDetail::create($this->inputs['detail']);

        $event->fire(new WasCreated($user));
    }

    protected function sanitize()
    {
        $detail = $this->request->input('detail');
        $detail['user_id'] = auth()->user()->id;

        $inputs['user']     = $this->request->input('user');
        $inputs['detail']   = $detail;

    return $inputs;
    }
}
