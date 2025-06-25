<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardContainer extends Controller
{
    public function index()
    {
        
        $product = Product::all();
        return view('dashboard', compact('product'));
    }

    public function categoryproducts(){
        $productelec = Product::where('category' , 'Electronics')->get();
        $productcom = Product::where('category' , 'Electronics')->get();
        $productmob = Product::where('category' , 'Electronics')->get();

                return view('electrnic', compact('productelec', 'productcom', 'productmob'));


    }



    
}
