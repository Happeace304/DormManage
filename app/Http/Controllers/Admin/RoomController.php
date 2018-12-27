<?php

namespace App\Http\Controllers\Admin;

use App\Model\Room;
use App\Model\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
   function List(){
       $room = Room::paginate(10);

       foreach ($room as $item){
           $item->billList = Room::find($item->roomId)->bills()->count();
       }
       return view('Admin.QuanLyPhong.DanhSachPhong',compact('room'));
   }

    function Detail(Request $request){
        $room = Room::paginate(10);

        foreach ($room as $item){
            $item->billList = Room::find($item->roomId)->bills()->count();
        }
        return view('Admin.QuanLyPhong.ChiTietPhong',compact('room'));
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
        return view('Admin.QuanLyPhong.DanhSachPhong',compact('room'));
    }
}
