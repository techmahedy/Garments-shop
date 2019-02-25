<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     public function comments()
    {
        return $this->hasMany(App\Model\user\product::class);
    }
}
