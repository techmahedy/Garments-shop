<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\product;
use App\Http\Controllers\Auth;
use App\Model\user\User;

class ProfileController extends Controller
{   
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function UserProfile($id)
    {   
    	 $user = User::find($id);
    	 return view('frontend.profile.profile',compact('user'));
    }
}
