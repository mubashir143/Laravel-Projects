<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function store(Request $request){
    $request->validate([
    'title' => 'required|string|max:255',
    'body' => 'nullable',
    
    ]);

    $user = Auth::guard('admin')->user();

    $post = new Post;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->user_id = $user->id; // 👈 Set user_id

    
    $post->save();

    return redirect()->route('admin.dashboard');

    }


    public function update(Request $request, $id){
    $request->validate([
    'title' => 'required|string|max:255',
    'body' => 'nullable',
    
    ]);

    $user = Auth::guard('admin')->user();

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->body = $request->body;
    $post->user_id = $user->id; // 👈 Set user_id

    
    $post->save();

    return redirect()->route('admin.dashboard');

    }


    public function delete($id){
        Post::destroy($id);
            return redirect()->route('admin.dashboard');

    }
}
