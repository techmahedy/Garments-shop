<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Cart;
use App\Model\user\product;

class AddToCartController extends Controller
{

     public function AddToCartProduct(Request $request, $id)
    {   
        $ip = $_SERVER['REMOTE_ADDR'];

        $product = product::find($id);
        $cart    = new Cart();

        $cart->title          =  $product->title;
        $cart->price          =  $product->price;    
        $cart->product_code   =  $product->product_code;
        $cart->quantity       =  $request->quantity;
        $cart->image          =  $product->image;
        $cart->session_id     =  $ip;
      
        $count = Cart::where('product_code' ,  $cart->product_code)->get()->count();

         if($count == true){
            return redirect()->back()->with('alert', 'This product is already added to your cart!');
        }
        else{      	
            $cart->save();     
            return redirect()->back()->with('alert', 'This product is added to your cart!');
        }
       
    }

    public function GettingProductFromCartTable(){
   	    $ip = $_SERVER['REMOTE_ADDR'];
        $cart   = Cart::where('session_id' , $ip)->get();
        $count  = Cart::where('session_id' , $ip)->get();
        return view('frontend.cart.create' , compact('cart','count'));
    }

    public function UpdateCart(Request $request , $id)
    {
      $cart = new Cart;    
      $cart->quantity = $request->quantity;
      Cart::where( 'id' , $id)->update( array( 'quantity' =>  $cart->quantity));

      return redirect()->back() ->with('alert', 'Cart updated successfully!');
    }
    
      public function DeleteCart($id)
    {    

      \DB::table('carts')->where('id',$id)->delete();
      return redirect()->back() ->with('alert', 'Cart deleted successfully!');
    }
}
