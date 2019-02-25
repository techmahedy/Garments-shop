<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\product;
use App\Model\user\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store($id)
    {
        $posts = product::find($id);
        $store = new Wishlist;
        
        $store->title   =  $posts->title;
        $store->slug    =  $posts->slug;    
        $store->image   =  $posts->image;
        $store->user_id =  Auth::user()->id;
        
        $count = Wishlist::where('slug' ,  $store->slug)->get()->count();

        if($count == true){
            return redirect()->back()->with('alert', 'This product is already added to your wishlist!');
        }else{
            $store->save();
            return redirect()->back()->with('alert', 'This product is added to your wishlist!');
        }
    }

     public function UserFavouriteProductList($id){

    	$likeposts = Wishlist::where('user_id' , $id)->orderBy('created_at' , 'DESC')->paginate(10);
        return view('frontend.wishlist.wishlist' , compact('likeposts'));
    }

}
