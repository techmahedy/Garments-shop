<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
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
         $users = admin::find(Auth::user()->id);
         return view('admin.settings.update',compact('users'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [

        'oldpassword' => 'required',
        'newpassword' => 'required',
        ]);

     
       
       $hashedPassword = Auth::user()->password;

       if (\Hash::check($request->oldpassword , $hashedPassword )) {
         
         if (!\Hash::check($request->newpassword , $hashedPassword)) {
              
              $users =admin::find(Auth::user()->id);
              $users->password = bcrypt($request->newpassword);
              admin::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

              session()->flash('message','Password updated successfully'); 
              return redirect()->back();
            }

            else{
                  session()->flash('message','New password can not be the old password!'); 
                  return redirect()->back();
                }

           }

          else{
               session()->flash('message','Old password doesnt matched ');
               return redirect()->back();
             }

       }
   
    public function destroy($id)
    {
        //
    }
}
