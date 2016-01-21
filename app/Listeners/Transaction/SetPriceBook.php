<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 19/01/2016
 * Time: 13:08
 */

namespace App\Listeners\Transaction;


use App\Events\Transaction\WasCreated;

class SetPriceBook
{
    public function handle(WasCreated $event)
    {
        //ambil transaksi dari event
        $transaction = $event->transaction;

        //ambil transaksi melalui model trans_detail
        foreach($transaction->trans_detail()->get() as $detail)
        {
            $book = $detail->book;

            //memasukkan harga barang yg diterima dari supp
            if($transaction->type = 'Receive')
            {
                if($book->qty > 0)
                {
                    $book->price = (int) $detail->price + ((int) $detail->price * 30/100);
                } else {
                    $last = (int) $book->price * (int) $book->stock;
                    $new = ((int) $detail->price + ((int) $detail->price * 30/100)) * (int) $detail->qty;
                    $sum = (int) $book->stock + (int) $detail->qty;

                    $book->price = $last * $new / $sum;
                }

            }

            $book->save();
        }
    }
}