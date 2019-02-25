<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\product;

class ShopController extends Controller
{
    public function GetProductData()
    {
        $items = product::where('status' , 1)->orderBy('created_at' , 'DESC')->paginate(6);

         if (\Request::ajax()) {
            return \Response::json(\View::make('frontend.ajax.shop-data')->with(compact('items'))->render());
        }

        return \View::make('shop')->with(compact('items'));
    }
}
