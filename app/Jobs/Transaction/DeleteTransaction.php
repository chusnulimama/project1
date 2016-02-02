<?php

namespace App\Jobs\Transaction;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Transaction;
use App\Events\Transaction\WasDelete;
use Illuminate\Events\Dispatcher;

class DeleteTransaction extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $transaction;
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {

    }
}
