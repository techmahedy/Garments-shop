<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    public function products()
    { 
    	return $this->belongsToMany('App\Model\user\product','brand_products')->where('status',1)->orderBy('created_at','ASC')->paginate(6);
    }

     public static function GettingTotalBrandNameOnSingleProductSidebar()
    {
        $brands = brand::where('status',1)->orderBy('created_at','DESC')->get();
        return $brands;
    }
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
