<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::paginate();
        return view('admin.permission', compact('permissions'));
    }


    public function create(){
        return view('admin.permissioncreate');
    }

    public function store(Request $request){
        $permission = new Permission;

         $permission->name = $request->name;
        $permission->save();

        return redirect()->route('admin.permission');
    } 
}
