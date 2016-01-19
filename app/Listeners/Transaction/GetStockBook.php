<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 19/01/2016
 * Time: 14:10
 */

namespace App\Listeners\Transaction;


use App\Events\Transaction\WasCreated;

class GetStockBook
{
    public function handle(WasCreated $event)
    {
        //ambil transaksi objeknya dari event
        $transaction = $event->transaction;

        //ambil transaksi melalui trans_detail() di model transaksi
        foreach($transaction->trans_detail()->get() as $detail)
        {
            //kita sdah msuk didalam detail transaksi, skrg mencari buku yg sedang diproses
            $book = $detail->book;

            //manipulasi data buku yg diterima/jual
            if($transaction->type == 'Receive')
            {
                $book->stock = (int) $book->stock + (int) $detail->qty;
            } else {
                $book->stock = (int) $book->stock - (int) $detail->qty;
                if($book->stock <= 0 )
                {
                    confirm("Stok Buku tidak mencukupi! Silahkan periksa stok Buku yg tersedia");
                }
            }

            $book->save();
        }
    }
}