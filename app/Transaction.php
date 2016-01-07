<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['id', 'user_id', 'trans_id', 'date_trans', 'total', 'payment', 'type'];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

}
