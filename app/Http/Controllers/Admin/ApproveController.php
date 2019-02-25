<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Review;

class ApproveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $review = Review::all();
        return view('admin.review.index', compact('review'));
    }

 
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
       $data = Review::find($id);
       return view('admin.review.update' , compact('data'));
    }

    public function update(Request $request, $id)
    {
 
         $Review = Review::find($id);
         $Review->status = $request->status;

         $update = Review::where( 'id' , $id)->update( array( 'status' => $Review->status));

         if ($update) {
             session()->flash('message','Review added successfully');
              return redirect()->back();
           }
         else{
            session()->flash('message','Sorry!');
             return redirect()->back();
           }
     
    }

   
    public function destroy($id)
    {
       $Review = Review::find($id);
       $Review->delete();
       session()->flash('message','Review deleted successfully');
       return redirect()->back();
    }
}
