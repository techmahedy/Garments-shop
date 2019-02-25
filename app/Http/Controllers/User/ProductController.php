<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\product;
Use Session;

class ProductController extends Controller
{
    public function GettingSingleProductData(product $product)
    {   
    	$Key = 'product' . $product->id;
             if (\Session::has($Key)) {
 
             \DB::table('products')
                ->where('id', $product->id)
                ->increment('view_count', 1);
              \Session::put($Key, 1);
            }
            
    	return view('frontend.product.single', compact('product'));
    }

   
}
