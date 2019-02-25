<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\sub_category;

class SubcategoryController extends Controller
{
     public function GettingSubcategoryRelatedProduct(sub_category $sub_category)
    {   
    	$items = $sub_category->products();
    	$data = $items->count();

    	if ($data > 0) {
    	 return view('frontend.sub_category.shop', compact('items'));
    	}
       else{
    		return view('404');
    	}
    	
    }
}
