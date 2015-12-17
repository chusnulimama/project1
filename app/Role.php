<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name', 'description'];

    public function users()
    {
        //method ini digunakan untuk mengetahui daftar user di status role
        return $this->belongsToMany(User::class, 'role_users', 'role_id', 'user_id');
    }

}
