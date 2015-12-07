<?php

namespace App\Jobs\Supp;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class DeleteSupp extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
