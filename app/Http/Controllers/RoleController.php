<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\returnSelf;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::paginate();
        return view('admin.role', compact('roles'));
    }


    public function create(){
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('admin.rolecreate', compact('permissions'));

    }

    public function store(Request $request){
        $role = new Role;

         $role->name = $request->name;
        $role->save();

        if(!empty($request->permission)){
            foreach($request->permission as $name){
                $role->givePermissionTo($name);
            }
        }

        return redirect()->route('admin.role');
    } 
}
