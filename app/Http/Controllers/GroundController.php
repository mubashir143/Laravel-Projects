<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Dotenv\Validator;
use App\Models\Ground;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Facility;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class GroundController extends Controller
{


    public function index(){
   
    $grounds = Ground::with('vendor', 'categories')->get();

    return view('ground.groundlist', compact('grounds'));
    }


    // Show the edit form
    public function showvendor($id)
    {
        // $grounds = Ground::with('vendor', 'categories');
        // $vendor = Vendor::findOrFail($id);
        // return view('ground.list', compact('vendor', 'grounds'));

    $vendor = Vendor::findOrFail($id);
    $grounds = Ground::with('vendor', 'categories')
        ->where('vendor_id', $id)
        ->get();

    return view('ground.list', compact('vendor', 'grounds'));
     
    }

    // Handle the update (this method was missing)
    public function editvendor(Request $request, $id)
    {
        $vendor = Vendor::findOrFail($id);

        // Update fields from request
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = bcrypt($request->password); // Encrypt password
        $vendor->description = $request->description;
        $vendor->city = $request->city;
        $vendor->location = $request->location;
        $vendor->isactive = $request->has('isactive');

        // Optional: Handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('vendor_images', 'public');
            $vendor->image = $path;
        }

        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor updated successfully.');
    }


    public function create($id){

        $vendor = Vendor::findOrFail($id);

        $categories = Category::all();
        return view('ground.add', compact('categories' , 'vendor'));
    }



    public function store(Request $request)
{
   $request->validate([
    'name' => 'required',
    'location' => 'required',
    'latitude' => 'required',
    'logitude' => 'required',
    'baseprice' => 'required',
    'discounttype' => 'required',
    'discountprice' => 'required',
    'openat' => 'required',
    'closeat' => 'required',
    'isactive' => 'sometimes|accepted',
    'ispopular' => 'sometimes|accepted',
    'vendor_id' => 'required|exists:vendors,id',
    'categories' => 'required|array',
    'categories.*' => 'exists:categories,id',
]);

$ground = Ground::create([
    'name' => $request->name,
    'location' => $request->location,
    'latitude' => $request->latitude,
    'logitude' => $request->logitude,
    'ispopular' => $request->has('ispopular'),
    'isactive' => $request->has('isactive'),
    'baseprice' => $request->baseprice,
    'discounttype' => $request->discounttype,
    'discountprice' => $request->discountprice,
    'openat' => $request->openat,
    'closeat' => $request->closeat,
    'vendor_id' => $request->vendor_id,
]);

$ground->categories()->sync($request->categories);

$allFacilityIds = Facility::pluck('id')->toArray();

$ground->facilities()->sync($allFacilityIds);


    return redirect()->route('ground.add')->with('success', 'Ground created successfully!');
}



public function groundedit($id)
{
    $ground = Ground::findOrFail($id);
    $categories = Category::all();
    $ground->load('categories');

    return view('ground.groundedit', compact('ground', 'categories'));
}

public function groundupdate(Request $request, $id)
{
 $request->validate([
    'name' => 'required|string|max:255',
    'location' => 'required|string',
    'latitude' => 'nullable|string',
    'logitude' => 'nullable|string',
    'baseprice' => 'required|numeric',
    'discounttype' => 'nullable|in:percentage,fix',
    'discountprice' => 'nullable|numeric',
    'openat' => 'nullable',
    'closeat' => 'nullable',
    'categories' => 'required|array',
    'categories.*' => 'exists:categories,id',
]);

$ground = Ground::findOrFail($id);


// ✅ Create the ground and save it to get the ID
$ground->name = $request->name;
$ground->location = $request->location;
$ground->latitude = $request->latitude;
$ground->logitude = $request->logitude;
$ground->ispopular = $request->has('ispopular');
$ground->isactive = $request->has('isactive');
$ground->baseprice = $request->baseprice;
$ground->discounttype = $request->discounttype;
$ground->discountprice = $request->discountprice;
$ground->openat = $request->openat;
$ground->closeat = $request->closeat;



$ground->save(); // ✅ Save to get an ID

// ✅ Now sync categories
$ground->categories()->sync($request->categories);

// Redirect
return redirect()->route('ground.index')->with('success', 'Ground created successfully!');
}





}
