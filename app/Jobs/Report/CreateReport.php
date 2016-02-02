<?php

namespace App\Jobs\Report;

use App\Events\Report\WasCreated;
use App\Jobs\Job;
use App\Transaction;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;

class CreateReport extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
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
        $report = Transaction::whereBetween('date_trans', [$this->request->input('from'), $this->request->input('until')])
            ->groupBy('date_trans')->having('type', '=', 'Receive')->get();

        $event->fire(new WasCreated($report));
    }
}
