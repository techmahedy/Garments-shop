<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [  	
    	'username',
        'user_id',
        'title',
        'product_id',
        'comment',
        'rating'
    ];
}
