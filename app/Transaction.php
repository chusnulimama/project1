<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['id', 'user_id', 'transaction_id', 'date_trans', 'total', 'payment', 'type'];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function trans_detail()
    {
        // menunjukkan bahwa transaksi ini punya relasi ke TransactionDetail model, dengan foreign key `transaction_id` dan primary key (di transaction model) `id`
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function trans_user()
    {
        //menunjukkan bahwa transaksi ini dilakukan oleh user mana.
        return $this->belongsToMany(User::class, 'user_id', 'transaction_id');
    }

    public function deliveries()
    {
        //untuk mengetahui transaksi sebagai status apa
        return $this->belongsTo(Delivery::class, 'transaction_id', 'user_id', 'delivery_id');
    }

//    public function setBooksPriceAttribute()
//    {
//       $book = [];
//        foreach ($this->books as $_book)
//        {
//            $book[] = $_book->price;
//        }
//        $this->attributes['price'] = ($book*30)/100);
//    }

    public function setBooksStockAttribute()
    {
//        $this->?attribute[stock] = $;
    }

}
