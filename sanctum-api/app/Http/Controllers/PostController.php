<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show the "Add New Post" form
    public function create()
    {
        return view('posts.create');
    }

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Process the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Save the post data (assuming you have a Post model)
        Post::create($validatedData);

        // Redirect to a page or flash a success message
        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
    }
}


