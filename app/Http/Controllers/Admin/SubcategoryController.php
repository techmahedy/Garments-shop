<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\sub_category;
use App\Model\user\subcategory_category;

class SubcategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $sub_categories = sub_category::all();   
        return view('admin.subcategory.index',compact('sub_categories','category'));
    }

    
    public function create()
    {     
        return view('admin.subcategory.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        'subcategory_name' => 'required|unique:sub_categories',
         'slug' => 'required|unique:sub_categories'
        ]);

        $subcategories = new sub_category;
        $subcategories->subcategory_name = $request->subcategory_name;
        $subcategories->slug = $request->slug;
        $subcategories->status = $request->status;
        
        $subcategories->save();
        session()->flash('message','Subcategory inserted successfully');
        return redirect()->back();
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $categories = category::all();
        $sub_categories = sub_category::find($id);
        return view('admin.subcategory.update',compact('sub_categories','categories'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'subcategory_name' => 'required'
        ]);
        $subcategories =sub_category::find($id);
        $subcategories->subcategory_name = $request->subcategory_name;  
        $subcategories->status = $request->status;

        $subcategories->save();
        session()->flash('message','subcategory updated successfully');
        return redirect()->back();
    }

   
    public function destroy($id)
    {
        
       $subcategories = sub_category::find($id);
       $subcategories->delete();
       return redirect()->back();
    }
}
