<?php

namespace App\Jobs\Cust;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateCust extends Job implements SelfHandling
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
