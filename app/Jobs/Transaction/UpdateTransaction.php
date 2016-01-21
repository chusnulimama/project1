<?php

namespace App\Jobs\Transaction;


use App\Jobs\Job;
use App\Transaction;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;

class UpdateTransaction extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    protected $transaction;

    public function __construct(Request $request, Transaction $transaction)
    {
        $this->request = $request;
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $this->updateTransaction();

    }
}
