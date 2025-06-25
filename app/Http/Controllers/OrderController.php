<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index($id){
        $products = Product::find($id);
        return view('order', compact('products'));


    }

    public function ordersubmit(Request $request){

        // $user = Session::get('users');
        // $product = Session::get('products');

        // if (!$user || !$product) {
        //     return back()->with('error', 'User or product data not found in session.');
        // }

        $order = new Order();

        $order->name = $request->name;
        $order->email = $request->email;
        $order->number = $request->number;
        $order->address = $request->address;
        $order->payment = $request->payment_method;
        $order->user_id = $request->user_id;
        $order->product_id = $request->product_id;
        


        $order->save();

        return redirect()->route('account.dashboard');


    }


    public function orderlist(){
            $users = User::with('orders')->get();

            $id = $users->orders->product_id;

            $product = Product::find($id);


       

        return view('admin.order', compact('users', 'product'));

        

    }
    
}
