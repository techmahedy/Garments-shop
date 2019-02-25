<?php

/***Admin Route Section ********/
Route::group(['namespace' => 'Admin'] , function(){

 // Content Section
  Route::resource('admin/category','CategoryController');
  Route::resource('admin/subcategory','SubcategoryController');
  Route::resource('admin/brand','BrandController');
  Route::resource('admin/product','productController');
  Route::resource('admin/approve','ApproveController');
  Route::resource('admin/card','CardController');

  Route::get('/backend' , 'HomeController@index');
  
  //Login Section
  /****Admin Login Route*****/
  Route::get('backend/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('backend/login', 'Auth\LoginController@login');
  Route::post('backend/logout', 'Auth\LoginController@logout')->name('logout');


  //Settings Section
  Route::resource('backend/settings','SettingsController');
  Route::resource('backend/profile','ProfileController');

  //Order Section
  Route::resource('backend/order','OrderController');
});


/***User Route Section ********/
Route::group(['namespace' => 'User'] , function(){

 Route::get('/product/{product?}','ProductController@GettingSingleProductData')->name('product');
 Route::get('/category/{category?}','CategoryController@GettingCategoryRelatedProduct')->name('category');
 Route::get('/brand/{brand?}','BrandController@GettingBrandRelatedProduct')->name('brand');
 Route::get('/sub_category/{sub_category?}','SubcategoryController@GettingSubcategoryRelatedProduct')->name('sub_category');

 Route::get('/shop',array('as'=>'pagination','uses'=>'ShopController@GetProductData'));
  
  //Cart Route Section 
 Route::post('/cart/product/{product?}','AddToCartController@AddToCartProduct');
 Route::get('/cart','AddToCartController@GettingProductFromCartTable');
 Route::post('/cart/{product?}','AddToCartController@UpdateCart');
 Route::get('/cart/{product}','AddToCartController@DeleteCart');
  
  //Oder Route Section 
 Route::get('/review-order','OrderController@ReviewCartBeforeOrder');
 //Route::get('/order','OrderController@GettingProductFromCartTableForOrderReview');
 Route::get('/payment','CheckoutController@Payment');

 
 //Review Controller 
 Route::post('/cart/rate/{product}','RatingController@UserRating');

 //Profile Controller 
  Route::get('/profile/{profile}','ProfileController@UserProfile');

  //Wishlish Section
  Route::post('/favourite/product/{product}','WishlistController@store');
  Route::get('/favourite/productlist/{product}','WishlistController@UserFavouriteProductList');

  //Newsletter Section
  Route::resource('newsletter','NewsletterController');

  //Place an order
  Route::post('/review-order/{order}','MakeorderController@MakeOrder');
  Route::get('/orderlist/{order}','MakeorderController@OrderList');
});

Auth::routes();
Route::get('/',array('as'=>'pagination','uses'=>'HomeController@GetProductData'));

