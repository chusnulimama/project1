<?php

namespace App\Jobs\Transaction;

use App\Events\Transaction\WasCreated;
use Illuminate\Http\Request;
use App\Jobs\Job;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

class CreateTransaction extends Job implements SelfHandling
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
        $date = date("dmY");
        $data = $this->request->input('transaction');
        if($data['type'] = 'Receive'){
            $data['transaction_id'] = 'R/'.$date.'/';
        } else{
            $data['transaction_id'] = 'SL/'.$date.'/';
        };

        $feed = Transaction::create($data);

        $items = $this->request->input('items', []);

        if (array_key_exists('id', $items) AND is_array($items['id']))
        {
            foreach ($items['id'] as $key => $value)
            {
                $detail = TransactionDetail::create([
                    'transaction_id' => $feed->id,
                    'book_id' => $value,
                    'qty' => $items['qty'][$key],
                    'price' => $items['price'][$key],
                    'subtotal' => $items['subtotal'][$key],
                ]);
            }
        }

        $event->fire(new WasCreated($feed));
    }
}
