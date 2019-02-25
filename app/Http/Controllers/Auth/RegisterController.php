<?php

namespace App\Http\Controllers\Auth;

use App\Model\user\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = '/review-order';


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
             'name' => 'required|string|max:10',
             'username' => 'required|string|max:10',
             'company' => 'required',
             'thana' => 'required',
             'zip' => 'required',
             'telephone' => 'required',
             'street' => 'required',
             'state' => 'required',
             'country' => 'required',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed'
             
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'company' => $data['company'],
            'thana' => $data['thana'],
            'zip' => $data['zip'],
            'telephone' => $data['telephone'],
            'street' => $data['street'],
            'state' => $data['state'],
            'country' => $data['country'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

         //\Mail::to($user)->send(new WelcomeMail($user));

         return $user;
    }
}
