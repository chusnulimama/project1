<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransactionDetail;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

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

    public function user()
    {
        //menunjukkan bahwa transaksi ini dilakukan oleh user mana.
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

//    public function user_detail()
//    {
//        return $this->belongsTo(UserDetail::class, 'user_id', 'id');
//    }

    public function deliveries()
    {
        //untuk mengetahui transaksi sebagai status apa
        return $this->belongsTo(Delivery::class, 'transaction_id', 'user_id', 'delivery_id');
    }

    public function setDateTransAttribute($date_trans)
    {
        return $this->attributes['date_trans'] = date('Y-m-d H:i:s', strtotime($date_trans));
    }

    protected $dates = ['deleted_at'];
}
