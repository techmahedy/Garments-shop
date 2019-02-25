<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\brand;

class BrandController extends Controller
{
     public function GettingBrandRelatedProduct(brand $brand)
    {   
    	$items = $brand->products();
    	$data = $items->count();
    	if ($data > 0) {
    	 return view('frontend.brand.shop', compact('items'));
    	}
       else{
    		return view('404');
    	}
    	
    }
}
