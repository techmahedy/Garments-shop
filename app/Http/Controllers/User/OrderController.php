<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Cart;

class OrderController extends Controller
{
    public function ReviewCartBeforeOrder(){
   	    $ip = $_SERVER['REMOTE_ADDR'];
        $cart   = Cart::where('session_id' ,$ip)->get();
        $count  = Cart::where('session_id' , $ip)->count();
        return view('frontend.order.order-review' , compact('cart','count'));
    }

}
