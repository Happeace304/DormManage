<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{


    function EditForm(Request $request){
        $user = User::findorFail($request->id);
        $room = Room::where('peopleCount','<',4)->get();
        return view('Admin.userEdit',compact(['user','room']));
    }
    function Update(Request $request){
        $user = User::findorFail($request->userId);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->roomId=$request->roomId;
        if($request->password !=null)
            $user->password= Hash::make($request->password);

        if($user->save())
            if($user->role ==2){
            $this->UpdateRoomCount($request, 'roomId');
            $this->UpdateRoomCount($request, 'oldroom');
        }
        //xu ly file
        if($user->save()){
            if($request->hasFile('image')) {
                $filename = time() . "." . $request->file('image')->getClientOriginalExtension();
                $up = $request->file('image')->move(public_path('image'), $filename);

                if ($up) {
                    $user->imgLink = $filename;
                    $save = $user->save();
                    if ($save) {
                        if (file_exists(public_path('image') . '\\' . $request->old_image)) {
                            unlink(public_path('image') . '\\' . $request->old_image);
                        }
                    }
                }
            }
        }
        return redirect()->route('Admin.home');
    }
   function  UpdateRoomCount(Request $request,  $room1){
        $room= Room::find($request->$room1);
        $room->peopleCount = User::where('roomId',$request->$room1)->count();
        $room->save();
    }
    function Delete(Request $request){
        $user = User::findOrFail($request->id);


        if($user->delete() )
            if(Auth::user()->role ==1)
        {  $room= Room::findOrFail($user->roomId);
            $room->peopleCount = User::where('roomId', $room->roomId)->count();

            $room->save();
        }
        return redirect()->back();

    }

    function Detail(Request $request){
        $user = User::findorfail($request->id);
        if($user->role ==2)
        $user->roomName= $user->room->roomName;
        return view('Admin.userDetail',compact('user'));
    }
    function Recharge(Request $request){
        $user = User::findorfail($request->id);
        $carbon = new Carbon($user->expire_date);
        $user->expire_date= $carbon->addMonths(3)->format('Y-m-d');
        $user->save();
        return redirect()->back();
    }

    function ListStudent()
    {

        $user = User::where('role',2)->where('state', 1)->orderby('name')->paginate(10);
        foreach ($user as $item){
                $item->roomName = User::find($item->userId)->room;
            }
        return view('Admin.QuanLySinhVien.danhSachSinhVien',compact('user'));
    }

    function ListNhanVien()
    {
        $user = User::where('role',1)->where('state', 1)->orderby('name')->paginate(10);

        return view('Admin.QuanLyNhanVien.danhSachNhanVien',compact('user'));
    }
    function SearchNhanvien(Request $request){
        $email = $request->Email;
        $ten = $request->TenNhanVien;

        $user = User::where('role', 1)->where('state', 1)->where('name','LIKE' ,'%'. $ten.'%')->where('email','LIKE' ,'%'. $email.'%')->orderBy('name','asc')->paginate(10);
        $user->appends(['Email' =>$email, 'TenNhanVien'=> $ten]);
        return view('Admin.QuanLyNhanVien.danhSachNhanVien',compact('user'));
    }
    function SearchSinhvien(Request $request){
        $email = $request->Email;
        $ten = $request->TenSinhVien;
        $phong= $request->TenPhong;

        $room= Room::select('roomId')->where('roomName','LIKE','%'.$phong.'%')->get();

        $user = User::where('role', 2)->where('state', 1)->where('name','LIKE' ,'%'. $ten.'%')
            ->where('email','LIKE' ,'%'. $email.'%')
            ->whereIn('roomId',$room)->orderBy('name','asc')->paginate(10);

        if($user)
        foreach ($user as $item){
            $item->roomName = User::find($item->userId)->room;
        }
        $user->appends(['Email' => $email, 'TenNhanVien'=> $ten,'TenPhong'=>$phong]);
        return view('Admin.QuanLySinhVien.danhSachSinhVien',compact('user'));
    }
}
