<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MarketpalceController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        return view('marketplace.list', compact('categories'));
    }
}
