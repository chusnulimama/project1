<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $table = 'transaction_details';

    protected $fillable = ['transaction_id', 'book_id', 'qty', 'price', 'disc', 'subtotal'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    protected $dates = ['deleted_at'];

    public function master()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
