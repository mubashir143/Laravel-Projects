<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Ground;
use App\Models\Category;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index(){
        $facilities = Facility::paginate(10);
        return view('facility.list', compact('facilities'));
    }

    public function store(Request $request){
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'isactive' => 'sometimes|accepted',
        ]);

        $facility = new Facility;
        $facility->name = $request->name;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/facility', 'public');
            $facility->image = $imagePath;
        }

        $facility->isactive = $request->has('isactive');
    
        $facility->save();

        return redirect()->route('facility.index')->with('success', 'facility created successfully!');

    }

    public function update(Request $request, $id){
          $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'isactive' => 'sometimes|accepted',
        ]);

        $facility = Facility::findOrFail($id);
        $facility->name = $request->name;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/facility', 'public');
            $facility->image = $imagePath;
        }

        $facility->isactive = $request->has('isactive');
    
        $facility->save();

        return redirect()->route('facility.index')->with('success', 'facility Edit successfully!');

    }



    
    public function delete($id)
    {
        $facility = Facility::findOrFail($id);
        if ($facility->image && Storage::disk('public')->exists($facility->image)) {
            Storage::disk('public')->delete($facility->image);
        }
        $facility->delete();
        return redirect()->route('facility.index')->with('success', 'facility deleted successfully!');
    }



   public function groundfacility($id)
{
    $ground = Ground::findOrFail($id);
    $categories = Category::all();
    $ground->load('categories');

    $facilities = Facility::all();
    $courts = Court::all();
    return view('facility.groundfacility', compact('ground', 'categories', 'facilities', 'courts'));
}


public function courtstore(Request $request, $id){
    $request->validate([
    'name' => 'required|string|max:255',
    'startat' => 'nullable',
    'endat' => 'nullable',
    'ispopular' => 'sometimes|accepted',

    ]);

    $court = new Court;
    $court->name = $request->name;
    $court->startat = $request->startat;
    $court->endat = $request->endat;
    $court->isactive = $request->has('isactive');
    $court->save();

    return redirect()->route('ground.facility',$id);
}



public function courtupdate(Request $request, $court, $ground)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'startat' => 'nullable',
        'endat' => 'nullable',
        'isactive' => 'nullable|boolean',
    ]);

    $court = Court::findOrFail($court);
    $court->name = $request->name;
    $court->startat = $request->startat;
    $court->endat = $request->endat;
    $court->isactive = $request->has('isactive');
    $court->save();

    return redirect()->route('ground.facility', $ground);
}


public function courtdestory($id){
    Court::destroy($id);


     return redirect()->route('ground.facility',$id);
    
}

    
}
