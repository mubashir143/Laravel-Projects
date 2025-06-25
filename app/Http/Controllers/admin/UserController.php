<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.user' ,compact('users'));
    }

    public function create(){
        return view('admin.usercreate');
    }


        public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if($validator->passes()){
            // Registration logic here
            $user =new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();

            return redirect()->route('admin.user')->with('success', 'Registration successful. Please login.');

        } else {
            return redirect()->route('admin.user')->withErrors($validator)->withInput();
        }

        return redirect()->route('account.login')->with('success', 'Registration successful. Please login.');
    }

    public function useredit($id){

        $user = User::find($id);
        return view('admin.useredit', compact('user'));
    }

       public function updateform(Request $request, $id){

       

           $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if($validator->passes()){
            // Registration logic here
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();

            return redirect()->route('admin.user')->with('success', 'Registration successful. Please login.');

        } else {
            return redirect()->route('admin.user')->withErrors($validator)->withInput();
        }

        return redirect()->route('account.login')->with('success', 'Registration successful. Please login.');
    }


    public function destroy($id){
        User::destroy($id);

        return redirect()->route('admin.user')->with('success', 'Registration successful. Please login.');

    }

       
    
}
