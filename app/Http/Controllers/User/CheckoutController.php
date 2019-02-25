<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
 
    public function Payment(){
    	return view('frontend.payment.payment');
    }
}
