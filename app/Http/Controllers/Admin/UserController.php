<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class UserController extends Controller
{




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
    function AddSinhVien()
    {
        $room = Room::where('peopleCount','<',4)->get();
        $action = URL::route('SaveSinhVien');
        return view('Admin.QuanLySinhVien.addEditSinhVien',compact(['room','action']));
    }

    function AddNhanVien()
    {    $action = URL::route('SaveNhanVien');
        return view('Admin.QuanLyNhanVien.addEditNhanVien',compact('action'));
    }
    function SaveNhanVien(Request $request){

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'birthday'=> $request->birthday,
            'password' => Hash::make($request->password),
            'phone'=> $request->phone,
            'address'=>$request->address,
            'role'=> $request->role,
            'gender'=> $request->gender == 'true'?1:0,
        ]);

        if($user->save()){
            $this->UpdateRoomCount();
        }
        return redirect()->route('DanhSachNhanVien');
    }
    function  UpdateRoomCount(){
        $room= Room::get();
        foreach ($room as $item){
            $item->peopleCount = User::where('roomId',$item->roomId)->count();
            $item->save();
        }

    }
    function SaveSinhVien(Request $request){

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'birthday'=> $request->birthday,
            'password' => Hash::make($request->password),
            'phone'=> $request->phone,
            'address'=>$request->address,
            'role'=> $request->role,
            'gender'=> $request->gender == 'true'?1:0,
            'roomId' =>$request->roomId,
            'expire_date'=> Carbon::now()->addMonths(3)->format('Y-m-d'),
        ]);

        if($user->save()){
            $this->UpdateRoomCount();
        }
        return redirect()->route('DanhSachSinhVien');
    }
    function EditFormSinhVien(Request $request){
        $user = User::findorFail($request->id);
        $room = Room::where('peopleCount','<',4)->get();
        $action = URL::route('SaveEditSinhVien');
        return view('Admin.QuanLySinhVien.addEditSinhVien',compact(['user','action','room']));
    }

    function  SaveEditSinhVien(Request $request){
        $user= User::findOrFail ($request->userId);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->email= $request->email;
        $user->address= $request->address;
        $user->gender= $request->gender=='true'?1:0;
        $user->birthday= date('Y-m-d',strtotime($request->birthday));
        $user->roomId= $request->roomId;
        if(isset($request->password)){
            $user->password= Hash::make($request->password);
        }
        if($user->save()){
            $this->UpdateRoomCount();
        }
        return redirect()->route('DanhSachSinhVien');
    }
    function EditFormNhanVien(Request $request){
        $user = User::findorFail($request->id);
        $action = URL::route('SaveEditNhanVien');
        return view('Admin.QuanLyNhanVien.addEditNhanVien',compact(['user','action']));
    }
    function  SaveEditNhanVien(Request $request){
        $user= User::findOrFail ($request->userId);
        $user->name= $request->name;
        $user->phone= $request->phone;
        $user->email= $request->email;
        $user->address= $request->address;
        $user->gender= $request->gender=='true'?1:0;
        $user->birthday= date('Y-m-d',strtotime($request->birthday));

        if(isset($request->password)){
            $user->password= Hash::make($request->password);
        }
        if($user->save()){
            $this->UpdateRoomCount();
        }
        return redirect()->route('DanhSachNhanVien');
    }
}
