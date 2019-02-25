<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    public function products()
    { 
    	return $this->belongsToMany('App\Model\user\product','subcategory_products')->where('status',1)->orderBy('created_at','ASC')->paginate(6);
    }

    public function categories()
    { 
    	return $this->belongsToMany('App\Model\user\category','category_sub_categories')->where('status',1)->orderBy('created_at','ASC')->paginate(6);
    }

     public function getRouteKeyName(){
        return 'slug';
    }

}
