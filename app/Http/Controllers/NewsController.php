<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        $newss = News::all();
        return view('news.list', compact('newss'));
    }

    public function create(){
        return view('news.add');
    }

    public function store(Request $request){
    
        $news = new News;

        $news->label = $request->label;
        $news->description = $request->description;
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $news->image = $imagePath;
        }
        $news->isactive = $request->has('isactive');
        $news->save();

        return redirect()->route('news.index');
    }

    public function update(Request $request, $id){
         $news = News::findOrFail($id);

        $news->label = $request->label;
        $news->description = $request->description;
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/news', 'public');
            $news->image = $imagePath;
        }
        $news->isactive = $request->has('isactive');
        $news->save();

        return redirect()->route('news.index');
    }

    public function delete($id){

        News::destroy($id);

        return redirect()->route('news.index');
    }


}

