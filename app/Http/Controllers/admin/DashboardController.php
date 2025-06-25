<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        
        
        $categoryCounts = Product::select('category', DB::raw('COUNT(*) as count'))
        ->whereIn('category', ['electronics', 'mobile', 'computer'])
        ->groupBy('category')
        ->get();

        $cate = Product::all();


        $posts = Post::all();

        $pendingCount = Order::where('status', 'pending')->count();

        $totalusers = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact('pendingCount', 'totalusers', 'categoryCounts', 'cate', 'posts'));

        
    }


    // public function chartdata(){
    //     $categoryCounts = Product::select('category', DB::raw('COUNT(*) as count'))
    //     ->whereIn('category', ['electronic', 'mobile', 'computer'])
    //     ->groupBy('category')
    //     ->get();

    //     return view('admin.product', compact('categoryCounts'));
    // }

}
