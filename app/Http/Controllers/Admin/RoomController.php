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


       return view('Admin.roomList',compact('room'));
   }
}
