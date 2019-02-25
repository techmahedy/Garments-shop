<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function order()
    {
        return $this->belongsTo(User::class);
    }

    public static function OrderNotification(){

    	$notify = Order::where('status' , '0')->count();
    	return $notify;
    }

     public static function Notification(){

    	$notification = Order::where('status' , '0')->count();
    	return $notification;
    }
}
