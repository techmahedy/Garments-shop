<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Cart;
use App\Model\user\Order;
use Illuminate\Support\Facades\Auth;

class MakeorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function MakeOrder($id)
    {
       $ip   = $_SERVER['REMOTE_ADDR'];
       $count = Cart::where('session_id' , $ip)->count();
       
       if ($count) {
        
         $cart = Cart::where('session_id' , $ip)->get();
         
             foreach ($cart as $item) { 
                 
                $title = $item->title;
                $quantity   = $item->quantity;
                $price     = $item->price;
                $image = $item->image;
                $user_id = $id;

           $values = array(
              array('title' => $title, 'quantity' => $quantity , 'price' => $price , 'image' => $image , 'user_id' => $user_id)
            );
           
             \DB::table('orders')->insert($values);   
           }

         return redirect()->back()->with('alert' , 'Order has done successfully');
       }
    
    }

    public function OrderList($id)
    {
    	$order = Order::where('user_id' , $id)->orderBy('created_at' , 'DESC')->paginate(10);
        return view('frontend.order.orderlist' , compact('order'));
    }
}
