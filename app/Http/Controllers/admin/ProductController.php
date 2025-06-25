<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        return  view('admin.product');
    }

       public function store(Request $request){

        $product = new Product;

        $img = $request->image;
        $ext = $img->getClientOriginalExtension();
        $imageName = time(). '.' . $ext;
        $img->move(public_path(). '/uploads', $imageName);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->desc = $request->desc;
            $product->image = $imageName;
            $product->category = $request->category;
            $product->save();

            return redirect()->route('admin.product');



    }
}
