<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Card;
use Illuminate\Support\Facades\Input;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $card = Card::latest()->get();
        return view('admin.card.index',compact('card'));
    }


    public function create()
    {   
        return view('admin.card.create');
    }

 
    public function store(Request $request)
    {  
        $this->validate($request, [
          'number' => 'required|unique:cards',
          'price' => 'required'
        ]);
        
       $price = $request->price;

        for ($i=1;  $i<=$request->number; $i++) { 
           $random = rand(10000000, 99999999);

           $values = array(
              array('number' => $random, 'price' => $price)
            );

        \DB::table('cards')->insert($values);   
        }
        session()->flash('message','Card inserted successfully');
        return redirect()->back();
      
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
