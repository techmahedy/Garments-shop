<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\product;
use App\Model\user\brand;
use App\Model\user\brand_product;
use App\Model\user\category;
use App\Model\user\category_product;
use App\Model\user\sub_category;
use App\Model\user\subcategory_product;
use App\Notifications\NewProductNotify;
use Illuminate\Support\Facades\Notification;
use App\Model\user\Newsletter;
use Illuminate\Notifications\Notifiable;

class productController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
         $products = product::latest()->get();
         return view('admin.product.index',compact('products'));
    }

  
    public function create()
    {   
        $productKey = product::RandomKeywordForProductCode();
        $categories = category::all();
        $brands = brand::all();
        $sub_categories = sub_category::all();
        return view('admin.product.create',compact('categories','brands','sub_categories','productKey'));
    }

   
    public function store(Request $request)
    {
         $this->validate($request,[

        'title' => 'required',
        'slug' => 'required|unique:products',
        'body' => 'required',
        'image' => 'required',
        'price' => 'required',
        'product_code' => 'required|unique:products'
        ]);

        $products = new product;
        

        $products->image = $request->file('image');
        $image_name = str_random(20);
        $ext = strtolower($products->image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/';
        $image_url = $upload_path.$image_full_name;
        $success = $products->image->move($upload_path,$image_full_name);
        
        $products->image = $image_url;


        $products->title = $request->title;
        $products->price = $request->price;
        $products->product_code = $request->product_code;
        $products->user_id = $request->user_id;
        $products->slug = $request->slug;
        $products->body = $request->body;
        $products->status = $request->status;
        $products->posted = $request->posted;
       
        $subscribers = Newsletter::all();
      
        foreach($subscribers as $subscriber){
            Notification::route('mail' , $subscriber->email)
                          ->notify(new NewProductNotify($products));
        }

        $products->save();     

        $products->productRelateToCategory()->sync($request->selectcategory);
        $products->productRelateToSubCategory()->sync($request->select_sub_category);
        $products->productRelateToBrand()->sync($request->selectbrand);
        
        session()->flash('message','Product inserted successfully');
        return redirect()->back();
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
       $products = product::find($id);
       $brands = brand::all();
       $categories = category::all();
       $sub_categories = sub_category::all();
       return view('admin.product.update',compact('products','brands','categories','sub_categories'));
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request,[

        'title' => 'required',
        'body'  => 'required',
        'image' => 'required',
        'price' => 'required'
        ]);

        $products =product::find($id);
        

        $products->image = $request->file('image');
        $image_name = str_random(20);
        $ext = strtolower($products->image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/';
        $image_url = $upload_path.$image_full_name;
        $success = $products->image->move($upload_path,$image_full_name);
        
        $products->image = $image_url;


        $products->title = $request->title;
        $products->price = $request->price;
        $products->user_id = $request->user_id;
        $products->body = $request->body;
        $products->status = $request->status;
        $products->posted = $request->posted;
        
        $products->productRelateToCategory()->sync($request->selectcategory);
        $products->productRelateToSubCategory()->sync($request->select_sub_category);
        $products->productRelateToBrand()->sync($request->selectbrand);
    
        $products->save();     

      
        
        session()->flash('message','Product updated successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $subcategory_products = subcategory_product::where("product_id","=",$id);
        $subcategory_products->delete();
        
        $category_product = category_product::where("product_id","=",$id);
        $category_product->delete();

        $brand_product = brand_product::where("product_id","=",$id);
        $brand_product->delete();

        $products = product::find($id);
        $products->delete();
        session()->flash('message','Product deleted successfully');
        return redirect()->back();
    }
}
