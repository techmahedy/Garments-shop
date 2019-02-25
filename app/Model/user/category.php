<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{  

	/**** Relation to Product *****/
     public function products()
    { 
    	return $this->belongsToMany('App\Model\user\product','category_products')->where('status',1)->orderBy('created_at','ASC')->paginate(6);
    }
    
    /**** Relation to Subcategory *****/

    public function CategoryRelateToSubcategory()
    { 
        return $this->belongsToMany('App\Model\user\sub_category','category_sub_categories')->withTimestamps();
    }

    public static function GettingTotalCategoryNameOnSingleProductSidebar()
    {
        $categories = category::latest()->get();
        return $categories;
    }

    public static function GettingTotalCategoryNameOnHeader()
    {
        $items = category::where('status',1)->orderBy('created_at','DESC')->get();
        return $items;
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
