<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\user\product;

class HomeController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

  public function GetProductData()
    {
        $items = product::where('status' , 1)->orderBy('created_at' , 'DESC')->paginate(5);

         if (\Request::ajax()) {
            return \Response::json(\View::make('frontend.ajax.data')->with(compact('items'))->render());
        }

        return \View::make('index')->with(compact('items'));
    }
    
}
