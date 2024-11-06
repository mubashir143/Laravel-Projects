<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request){

        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|confirmed',
        ]); 

        $user = User::create($data);

        if($user){
            return redirect('/login');
        }

    }



    function login(Request $req){
        $user =  User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "username or password in not matched";

        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}
