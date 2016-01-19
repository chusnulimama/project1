<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';

    protected $fillable = ['transaction_id', 'book_id', 'qty', 'price', 'disc', 'subtotal'];
}
