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
          // $users = User::all();


          $users = User::simplepaginate(4);





          //    foreach ($users as $user) {
          //     echo $user->name . "<br>";
      
           return view("home", compact('users'));
      
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adduser"); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        User::create([
            'user_name'=> $request->username,
            'email'=> $request->useremail,
            'salary'=> $request->usersalary,
            'dob'=> $request->userdob,
            'password'=> $request->userpassword,
        ]);

        return redirect()->route('user.index')
                        ->with('status', 'New user Addded Successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);

        return view("viewuser",compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users= User::find($id);
        return view("update", compact('users')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $user = User::where('id', $id)
                        ->update([
                            'user_name'=> $request->username,
                            'email'=> $request->useremail,
                            'salary'=> $request->usersalary,
                            'dob'=> $request->userdob,
                            'password'=> $request->userpassword,
                        ]);




        return redirect()->route('user.index')
        ->with('status', 'Updated User Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();

        return redirect()->route('user.index')
        ->with('status', 'Deleted User Successfully.');


    }
}
