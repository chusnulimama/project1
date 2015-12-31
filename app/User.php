<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password','status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function detail()
    {
        // menunjukkan bahwa user ini punya relasi ke UserDetail model, dengan foreign key `user_id` dan primary key (di user model) `id`
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    public function roles()
    {
        //untuk pivot tabel mengetahui user sebagai status apa
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    public function getDetailNameAttribute()
    {
        return (is_object($this->detail)) ? $this->detail->name : '';
    }

    public function getDetailAddressAttribute()
    {
        return (is_object($this->detail)) ? $this->detail->address : '';
    }

    public function getDetailCityAttribute()
    {
        return (is_object($this->detail)) ? $this->detail->city : '';
    }

    public function getDetailPhoneAttribute()
    {
        return (is_object($this->detail)) ? $this->detail->phone : '';
    }

    public function getDetailFaxAttribute()
    {
        return (is_object($this->detail)) ? $this->detail->fax : '';
    }

    public function getDetailNoteAttribute()
    {
        return (is_object($this->detail)) ? $this->detail->note : '';
    }

    public function getRolesNameAttribute()
    {
        return (is_object($this->roles[0])) ? $this->roles[0]->name : '';
    }

    public function getRolesDescriptionAttribute()
    {
        return (is_object($this->roles[0])) ? $this->roles[0]->description : '';
    }

    public function getRoleAttribute()
    {
        $role = [];

        foreach ($this->roles as $_role)
        {
            $role[] = $_role->name;
        }

        return implode(', ', $role);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
