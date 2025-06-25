<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::all();
        return view('category.listcategories', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('category.add');
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'isactive' => 'sometimes|accepted',
            'allowmatch' => 'sometimes|accepted',
        ]);

        $user = Auth::guard('admin')->user();


        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $category->image = $imagePath;
        }

        $category->isactive = $request->has('isactive');
        $category->allowmatch = $request->has('allowmatch');
        $category->user_id = $user->id; // 👈 Set user_id


        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    // Show the form for editing the specified category
    // public function edit($id)
    // {
    //     $category = Category::findOrFail($id);
    //     return view('category.edit', compact('category'));
    // }

    // Update the specified category in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isactive' => 'sometimes|accepted',
            'allowmatch' => 'sometimes|accepted',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $category->image = $imagePath;
        }

        $category->isactive = $request->has('isactive');
        $category->allowmatch = $request->has('allowmatch');

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }




        public function destroy($id)
        {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
        }

}