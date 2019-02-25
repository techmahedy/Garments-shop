<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
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
         $users = admin::find($id);
         return view('admin.profile.update',compact('users'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [   
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255'
        ]);
 
        $admins = admin::find($id);
        if ($admins->image = $request->file('image')) {

        $image_name = str_random(20);
        $ext = strtolower($admins->image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/';
        $image_url = $upload_path.$image_full_name;
        $success = $admins->image->move($upload_path,$image_full_name);
        

        $admins->image = $image_url;
        $admins->name = $request->name;
        $admins->email = $request->email;
        
        admin::where( 'id' , $id)->update( array( 'name' =>  $admins->name , 'email' => $admins->email , 'image' => $admins->image ));
        
        session()->flash('message','Your profile updated successfully');
        return redirect()->back();
        }
        else{
       
        $admins->name = $request->name;
        $admins->email = $request->email;
 
        admin::where( 'id' , $id)->update( array( 'name' =>  $admins->name , 'email' => $admins->email));
        
        session()->flash('message','Your profile updated successfully');
        return redirect()->back();
        }     
    }

   
    public function destroy($id)
    {
        //
    }
}
