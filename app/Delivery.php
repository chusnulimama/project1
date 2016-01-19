<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    protected $fillable = ['transaction_id', 'user_id', 'date_sent', 'status'];

    public function users()
    {
        //method ini digunakan untuk mengetahui daftar user di status delivery
        return $this->belongsToMany(User::class, 'transaction_id', 'user_id');
    }

}
