<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room;

class NewsController extends Controller
{
    //
    function List(){
        $news = Room::paginate(10);
        return view('Admin.QuanLyTinTuc.DanhSachTinTuc',compact('news'));
    }
}
