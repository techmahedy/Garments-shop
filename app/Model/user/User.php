<?php

namespace App\Model\user;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name','username','company','thana','zip','telephone','street','state','country','email','password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
