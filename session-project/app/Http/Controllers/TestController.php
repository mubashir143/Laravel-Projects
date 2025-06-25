<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        //  $value = session()->all();
 
        //  echo "<pre>";
        //  print_r($value);
        //  echo "</pre>";\\\\

    
        $value = session()->get('name');

    echo $value;

    }


    public function storeSession(){
        
        session(['name' => 'mubashir name']);

        session()->put("class","ali");

       // return redirect('/');
        
    }

    public function deleteSession(){
        session()->forget('name');
    }
}


