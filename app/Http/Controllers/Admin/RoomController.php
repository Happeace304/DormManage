<?php

namespace App\Http\Controllers\Admin;

use App\Model\Room;
use App\Model\Bill;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
   function List(){
       $room = Room::paginate(10);

       foreach ($room as $item){
           $item->total = number_format(Room::find($item->roomId)->bills()->sum('total'),0,'.',',' );

       }

       return view('Admin.QuanLyPhong.danhSachPhong',compact('room'));
   }

    function Detail(Request $request){
        $room = Room::findorFail($request->id);
        $user = User::where('roomId',$request->id)->get();
        $bill = Bill::where('roomId',$request->id)->orderBy('month','desc')->take(5)->get();
        return view('Admin.QuanLyPhong.ChiTietPhong',compact(['user','bill','room']));
    }

    function SearchPhong(Request $request){
    $phong = $request->Phong;
    $tinhtrang = $request->TinhTrang;

    if($tinhtrang!=null){

        if($tinhtrang == 'true') $cmp='=';
            else if($tinhtrang == 'false') $cmp= '<';

    }else $cmp= '<=';
    $room = Room::where('roomName','like','%'.$phong.'%')->where('peopleCount', $cmp, 4)->paginate(10);
    $room->appends(['Phong' =>$phong, 'TinhTrang'=> $tinhtrang]);
        return view('Admin.QuanLyPhong.danhSachPhong',compact('room'));
    }

}
