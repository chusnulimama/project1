<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 19/01/2016
 * Time: 13:08
 */

namespace App\Listeners\Transaction;


use App\Events\Transaction\WasCreated;

class SetSuppBook
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
            if($transaction->type == 'Receive')
            {
                //set user transaction
                $users = $this->request->input('users', []);
                $book->user()->sync($users);

                //set nama supplier di tabel book
                $book->supplier = $event->transaction->user_id;

            }

            $book->save();
        }
    }
}