<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller

{

     // 📌 Show all posts by the logged-in user
    public function index()
    {
        
        $posts = Post::all();

        return response()->json([
            'status' => true,
            'msg' => 'All Post Here',
            'posts' => $posts
        ]);
    }


 
    // 📌 Create a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'nullable|string',
        ]);

        // $user = Auth::guard('admin')->user(); 
        $user = Auth::user(); 
        
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $user->id; // ✅ assign from Auth
        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'Post created successfully',
            'post' => $post
        ], 201);
    }

    // 📌 Update existing post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'nullable|string',
        ]);

        $user = Auth::guard('admin')->user(); 

        $post = Post::where('user_id', $user->id)->findOrFail($id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'Post updated successfully',
            'post' => $post
        ]);
    }

    // 📌 Delete post
    public function delete($id)
    {
        Post::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully'
        ]);
    }


    public function showUserpost($id)
{
    $user = User::with('posts')->findOrFail($id);
    return response()->json([
        'user' => $user->name,
        'posts' => $user->posts,
    ]);
   
}


}