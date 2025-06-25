<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Category;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        $cate = Category::all();

        return response()->json([
           'status' => true,
           'msg' => "user data",
           'users' => $user,
           'caategory' =>$cate,

        ],200);
    }




 public function login(Request $request){

            $validateUser = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => 'false',
                'message' => 'Athentication Error',
                'errors' => $validateUser->errors()->all()
            ],404);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            $authUser->tokens()->delete();
              return response()->json([
                'status' => 'true',
                'message' => 'user loged in Succesfully',
                
                'token' => $authUser->createToken("API Token")->plainTextToken,
                'token_type' => 'bearer'
        ],200);
        }
        else{
             return response()->json([
                'status' => 'false',
                'message' => 'Athentication Failed',
                
            ],401);
        }

}
}