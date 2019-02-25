<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\sub_category;
use App\Model\user\category_sub_category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {    
         $categories = category::latest()->get();
         return view('admin.category.index', compact('categories'));
    }

   
    public function create()
    {   
        $sub_categories = sub_category::all();
        return view('admin.category.create' , compact('sub_categories'));
    }

    public function store(Request $request)
    {
          
        $this->validate($request, [

         'category_name' => 'required|unique:categories',
         'category_id'  => 'required',
         'slug' => 'required|unique:categories'

        ]);
        $categories = new category;
        $subcategories = new sub_category;
        $categories->category_name = $request->category_name;
        $categories->slug = $request->slug;
        $categories->status = $request->status;
        $categories->save();
        
        $categories->CategoryRelateToSubcategory()->sync($request->category_id);

        session()->flash('message','Category inserted successfully');
        return redirect()->back();
    }

 
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {    
         $categories = category::find($id);
         $sub_categories = sub_category::all();
         return view('admin.category.update',compact('categories','sub_categories'));
    }

  
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [

        'category_name' => 'required'
        ]);
        $categories = category::find($id);
        $categories->category_name = $request->category_name;
        $categories->status = $request->status;
        $categories->CategoryRelateToSubcategory()->sync($request->category_id);
        $categories->save();

        session()->flash('message','Category updated successfully');
        return redirect()->back();
    }

    
    public function destroy($id)
    {  
       
       $category_sub_category = category_sub_category::where("category_id","=",$id);
       $category_sub_category->delete();

       $category = category::find($id);
       $category->delete();
       return redirect()->back();
    }
}
