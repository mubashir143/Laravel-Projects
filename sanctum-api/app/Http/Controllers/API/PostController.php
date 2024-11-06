<?php

namespace App\Http\Controllers\API;

use Validator;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;

class PostController extends BaseController
{
    public function index()
    {
        $data['post'] = Post::all();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'All Post here',
        //     'data' => $data,
        // ], 200);

        return $this->sendResponse($data, 'All Post Here');
    }

    public function store(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif',
            ]
        );

        if ($validateUser->fails()) {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Validation Error',
            //     'errors' => $validateUser->errors()->all(),
            // ], 401);

            return $this->sendError('validation Error', $validateUser->errors()->all());
        }

        $img = $request->image;
        $ext = $img->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $img->move(public_path() . '/uploads', $imageName);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post created successfully',
        //     'post' => $post,
        // ], 200);

        return $this->sendResponse($post, 'Post created successfully');

    }

    public function show(string $id)
    {
        $data['post'] = Post::select('id', 'title', 'description', 'image')->where('id', $id)->first();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Your single post',
        //     'data' => $data,
        // ], 200);

        return $this->sendResponse($data, 'Your single post');

        

    }

    public function update(Request $request, string $id)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'description' => 'required',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            ]
        );

        if ($validateUser->fails()) {
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Validation Error',
            //     'errors' => $validateUser->errors()->all(),
            // ], 401);

            return $this->sendError('validation Error', $validateUser->errors()->all());
        }

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = public_path() . '/uploads';

            if ($post->image && file_exists($path . '/' . $post->image)) {
                unlink($path . '/' . $post->image);
            }

            $img = $request->image;
            $ext = $img->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $img->move($path, $imageName);
        } else {
            $imageName = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post updated successfully',
        //     'post' => $post,
        // ], 200);

        return $this->sendResponse($post, 'Post Updated Successfully');

        
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $filePath = public_path() . '/uploads/' . $post->image;

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $post->delete();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post deleted successfully',
        //     'post' => $post,
        // ], 200);

        return $this->sendResponse($post, 'Post Deleted');

    }
}
