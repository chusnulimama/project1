<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 19/01/2016
 * Time: 12:54
 */

namespace App\Listeners\Transaction;

use App\Events\Transaction\WasCreated;

class ChangeIdTransaction
{
    public function handle(WasCreated $event)
    {
        try{
            $event->transaction->transaction_id = $event->transaction->transaction_id.$event->transaction->id;
            $event->transaction->save();
        } catch(\Exception $e){
            throw new \Exception('Error at Listener:' .self::class);
        }
    }
}