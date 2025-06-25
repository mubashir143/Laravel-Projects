<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('file-upload',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo'=> 'required|mimes:png,jpg,jpeg'
        ]);
        $file = $request->file('photo');

        // $path = $request->file('photo')->store('image','public');  this file is store in public directory

       // $path = $request->file('photo')->store('image','local');    this file is store in direct storage directory 


      // $filename = time(). '_'. $file->getClientOriginalName();    to store file orignal name not modified

       //$path = $request->photo->storeAs('image',$filename,'public');

       $path = $request->file('photo')->store('image','public');

       User::create([
        'file_name' => $path,
       ]);

        return redirect()->route('user.index')->with('status', 'user image uploded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('file-update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user  = User::find($id);

        if($request->hasFile('photo')){

            $image_path = public_path("storage/" . $user->file_name);
        
            if(file_exists($image_path)){
                @unlink($image_path);
            }

            $path = $request->photo->store('image', 'public');
            $user->file_name= $path;
            $user->save();

            return redirect()->route('user.index')->with('status', 'Updated user image successfully');
        
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        $image_path = public_path("storage/" . $user->file_name);
        
        if(file_exists($image_path)){
            @unlink($image_path);
        }

        return redirect()->route('user.index')->with('status', 'Deleted user image successfully');


    }
}
