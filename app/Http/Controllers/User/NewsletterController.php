<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Newsletter;
use App\Mail\JoinNotify;

class NewsletterController extends Controller
{
   
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

        $this->validate($request, [   
        'email' => 'required|string|email|max:255|'
        ]);

        $user = new Newsletter;
        $user->email = $request->email;

        \Mail::to($user->email)->send(new JoinNotify());
         $user->save();
        return redirect()->back()->with('alert' , 'Thanks for subscribing');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
