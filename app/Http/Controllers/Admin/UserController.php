<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function list(){
        $user = User::where('role',2)->where('state', 1)->paginate(10);
        foreach ($user as $item){

            $item->roomName = User::find($item->userId)->room;
        }

        return view('Admin.user',compact('user'));
    }
    function EditForm(Request $request){
        $user = User::findorFail($request->id);
        $room = Room::where('state',0)->get();
        return view('Admin.userEdit',compact(['user','room']));
    }
    function Update(Request $request){
        $user = User::findorFail($request->userId);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->roomId=$request->roomId;
        if($request->password !=null)
            $user->password= Hash::make($request->password);

        if($user->save()){
           return redirect(route('Admin.home'));
        }
        function Delete(Request $request){
            $user = User::findorFail($request->userId);
            $user->state= 0;
        }
    }
    function Delete(Request $request){
        $user = User::findorFail($request->id);
        $user->state= 0;
        $user->save();
    }
}
