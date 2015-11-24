<?php

namespace App\Jobs\login;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use App\Events\login\WasPass;
use Illuminate\Support\Facades\Auth;


class DoLogin extends Job implements SelfHandling
{
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
        $username = $this->request->input('username');
        $password = $this->request->input('password');

        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $login = $defense->attempt([$field => $username, 'password' => $password]);

        if ($login)
        {
            $event->fire(new WasPass($defense->user(), $this->request));
        }
        return $login;
    }
}
