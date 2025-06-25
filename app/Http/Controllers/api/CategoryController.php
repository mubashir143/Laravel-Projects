<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Ground;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
     public function index()
    {
        $categories = Category::all();
        
        if(!empty($categories)){
        
        return response()->json([
                'status' => 'true',
                'message' => 'All the Categories here',
                'categories' =>$categories,
                
        ],200);

        }
        else{
             return response()->json([
                'status' => 'false',
                'message' => 'Athentication Failed',
                
            ],401);
        }
    }

    public function ground(){
        $grounds = Ground::with('vendor', 'categories')->get();

        if(!empty($grounds)){
        
        return response()->json([
                'status' => 'true',
                'message' => 'All the grounds here',
                'grounds' =>$grounds,
                
        ],200);
        
        }
        else{
             return response()->json([
                'status' => 'false',
                'message' => 'Athentication Failed',
                
            ],401);
        }
    }



public function showUserCategories($id)
{
    $user = User::with('categories')->findOrFail($id);
    return response()->json([
        'user' => $user->name,
        'categories' => $user->categories,
    ]);


    
}

}
