<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public static function cart(){
      $ip = $_SERVER['REMOTE_ADDR'];
      $headerCartCount = Cart::where('session_id' , $ip)->sum('quantity');
    	return $headerCartCount;
    }

     public static function GettingCostFromCartForHeader(){
   	    $ip = $_SERVER['REMOTE_ADDR'];
        $cart   = Cart::where('session_id' ,$ip)->get();
        $sum = 0;
        foreach ($cart as $item) {
        	 $sum = $sum + $item->price*$item->quantity;
        }
          $total = $sum;
        return $total;
    }
    
}
