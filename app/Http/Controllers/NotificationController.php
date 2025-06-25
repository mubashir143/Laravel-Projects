<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){

        $notifications = Notification::all();
        return view('notification.list', compact('notifications'));
    }

    public function create(){
        return view('notification.add');
    }

    public function store(Request $request){
    
        $notification = new Notification;

        $notification->label = $request->label;
        $notification->description = $request->description;
        $notification->isactive = $request->has('isactive');
        $notification->save();

        return redirect()->route('notification.index');
    }

    public function update(Request $request, $id){
         $notification = Notification::findOrFail($id);

        $notification->label = $request->label;
        $notification->description = $request->description;
        $notification->isactive = $request->has('isactive');
        $notification->save();

        return redirect()->route('notification.index');
    }

    public function delete($id){

        Notification::destroy($id);

        return redirect()->route('notification.index');
    }
}
