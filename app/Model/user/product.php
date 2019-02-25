<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{   

      public function productRelateToCategory()
    {
    	return $this->belongsToMany('App\Model\user\category','category_products')->withTimestamps();
    }

    public function productRelateToSubCategory()
    {
    	return $this->belongsToMany('App\Model\user\sub_category','subcategory_products')->withTimestamps();
    }

    public function productRelateToBrand()
    {
    	return $this->belongsToMany('App\Model\user\brand','brand_products')->withTimestamps();
    }
    
     public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function ProductReview()
    {
        return $this->hasMany(Review::class)->where('status',1)->orderBy('created_at','DESC');
    }
   
    public function getStarRating()
    {
        $count = $this->ProductReview()->count();
        if(empty($count)){
            return 0;
        }
        $starCountSum = $this->ProductReview()->sum('rating');
        $average = $starCountSum/ $count;
        return $average;
    }
   
   public static function RandomKeywordForProductCode()
   {
       $text = 'ABCDE'; 
       $random = rand(10000, 99999); 
       $productCode = "#$text$random";
       return $productCode;
   }
}
