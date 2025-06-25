<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->passes()){
            // Authentication logic here
           if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                // Authentication passed...
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error','Either Email or password is Incorrect');
            }
        } else {
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function register()
    {
        // Registration logic here
        return view('register');
    }




    public function logout()
    {
        Auth::logout();
        return view('welcome');
        //return redirect()->route('account.login')->with('success', 'Logged out successfully.');
    }
}
        