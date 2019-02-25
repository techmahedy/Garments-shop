<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
         $brands = brand::latest()->get();
         return view('admin.brand.index', compact('brands'));
    }

  
    public function create()
    {
        return view('admin.brand.create');
    }

  
    public function store(Request $request)
    {
         $this->validate($request, [

        'brand_name' => 'required|unique:brands',
         'slug' => 'required|unique:brands'

        ]);
        $brands = new brand;
        $brands->brand_name = $request->brand_name;
        $brands->slug = $request->slug;
        $brands->status = $request->status;
        $brands->save();
        
        session()->flash('message','Brand inserted successfully');
        return redirect()->back();
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
         $brands = brand::find($id);
         return view('admin.brand.update',compact('brands'));
    }

   
    public function update(Request $request, $id)
    {
       $this->validate($request, [
        'brand_name' => 'required'
        ]);

        $brands = new brand;
        $brands->brand_name = $request->brand_name;
        $brands->status = $request->status;
        brand::where( 'id' , $id)->update( array( 'brand_name' =>  $brands->brand_name , 'status' =>  $brands->status ));
            
        session()->flash('message','Brand updated successfully');
        return redirect()->back();
    }

   
    public function destroy($id)
    {
       $brand = brand::find($id);
       $brand->delete();
       return redirect()->back();
    }
}
