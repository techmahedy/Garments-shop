<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Order;
use App\Model\user\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
   

    public function index()
    {  
      
       $data = Order::latest()->get();
       return view('admin.orders.index' , compact('data'));
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
       $data = User::find($id);
       return view('admin.orders.customer' , compact('data'));
    }

    
    public function edit($id)
    {
        $data = Order::find($id);
        return view('admin.orders.update' , compact('data'));
    }

    
    public function update(Request $request, $id)
    {
         $Review = Order::find($id);
         $Review->status = $request->status;

         $update = Order::where( 'id' , $id)->update( array( 'status' => $Review->status));

         if ($update) {
             session()->flash('message','Order added successfully');
              return redirect()->back();
           }
         else{
            session()->flash('message','Sorry!');
             return redirect()->back();
           }
    }

   
    public function destroy($id)
    {
        $data = Order::find($id);
        $data->delete();
        session()->flash('message','Order added successfully');
        return redirect()->back();
    }
}
