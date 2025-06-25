<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
     public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.list', compact('vendors'));
    }
    

    public function create()
    {
        return view('vendor.add');
    }

    public function store(Request $request){
          $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'city' => 'required',
            'location' => 'required',
            'isactive' => 'sometimes|accepted',
            
        ]);

        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = $request->password;
        $vendor->description = $request->description;
        $vendor->city = $request->city;
        $vendor->location = $request->location;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/vendors', 'public');
            $vendor->image = $imagePath;
        }

        $vendor->isactive = $request->has('isactive');
       

        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'vendor created successfully!');
    

    }



    public function update(Request $request, $id){
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            
            'isactive' => 'sometimes|accepted',
            
        ]);




        $vendor = Vendor::findOrFail($id);
        $vendor->name = $request->name;
        
        $vendor->description = $request->description;
      

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/vendors', 'public');
            $vendor->image = $imagePath;
        }

        $vendor->isactive = $request->has('isactive');
       

        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'vendor created successfully!');
    

    
    }


    public function delete($id)
    {
        $vendor = Vendor::findOrFail($id);
        if ($vendor->image && Storage::disk('public')->exists($vendor->image)) {
            Storage::disk('public')->delete($vendor->image);
        }
        $vendor->delete();
        return redirect()->route('vendor.index')->with('success', 'Vendor deleted successfully!');
    }

}
