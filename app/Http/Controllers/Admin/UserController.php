<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    function list(){
        $userrole= Auth::user()->role;
        $userrole == 0? $role= 1:$role=2;
        $user = User::where('role',$role)->where('state', 1)->paginate(10);
        if(Auth::user()->role == 1)
        foreach ($user as $item){
            $item->roomName = User::find($item->userId)->room;
        }

        return view('Admin.userList',compact('user'));
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

            $this->UpdateRoomCount($request, 'roomId');
            $this->UpdateRoomCount($request, 'oldroom');
           return redirect(route('Admin.home'));
        }

    }
   function  UpdateRoomCount(Request $request,  $room1){
        $room= Room::find($request->$room1);
        $room->peopleCount = User::where('roomId',$request->$room1)->count();
        if ($room->peopleCount == 4) $room->state=1;
        else $room->state=0;
        $room->save();
    }
    function Delete(Request $request){
        $user = User::findOrFail($request->id);


        if($user->delete() )
            if(Auth::user()->role ==1)
        {  $room= Room::findOrFail($user->roomId);
            $room->peopleCount = User::where('roomId', $room->roomId)->count();
            if ($room->peopleCount >= 4) $room->state=1;
            else $room->state=0;
            $room->save();
        }
        return redirect()->route('User.List');

    }
    function Search(Request $request){
        $userrole= Auth::user()->role;
        $userrole == 0? $role= 1:$role=2;
        $find= $request->get('select');
        $user=null;
        if($find== 'name') {
            $user = User::where('role', $role)->where('state', 1)->where('name','LIKE' ,'%'. $request->get('q').'%')->paginate(10);

            if(count($user)>0) {
                foreach ($user as $item) {

                    $item->roomName = User::find($item->userId)->room;
                }
            } else $user =null;

        }else if ($find == 'room') {

            $room = Room::where('roomName', $request->get('q'))->first();
            if ($room) {

                $user = User::where('role', $role)->where('state', 1)->where('roomId', $room->roomId)->paginate(10);
                if(count($user)>0) {
                foreach ($user as $item) {
                    $item->roomName = User::find($item->userId)->room;
                }}else $user =null;
            }
        }
        return view('Admin.userList',compact('user'));

    }
    function Detail(Request $request){
        $user = User::findorfail($request->id);
        $user->roomName= $user->room->roomName;
        return view('Admin.userDetail',compact('user'));
    }
}
