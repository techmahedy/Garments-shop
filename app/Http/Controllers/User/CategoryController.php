<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\category;

class CategoryController extends Controller
{
    public function GettingCategoryRelatedProduct(category $category)
    {   
    	$items = $category->products();
    	$data = $items->count();
    	if ($data > 0) {
    	 return view('frontend.category.shop', compact('items'));
    	}
       else{
    		return view('404');
    	}
    	
    }
}
