<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Review;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   

   public function UserRating(Request $request , $id)
    {
        auth()->user()->review()->create($request->all());
        return redirect()->back()->with('alert', 'Thanks for your review'); 
    /* 
        $Review  = new Review();
        $Review->product_id = $request->product_id;
        $count = Review::where('product_id' ,  $Review->product_id)->get()->count();

         if($count == true){
            return redirect()->back() ->with('alert', 'Sorry ! you have already added your review for this product. ');
        }else{          
            auth()->user()->review()->create($request->all()); 
            return redirect()->back(); 
        } 
        */
    }

}
