<?php

namespace App\Http\Controllers;

use App\Model\News;
use App\Model\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function dangnhap()
    {
        return view('Client.login');
    }

    public function Profile()
    {   $user= Auth::user();

        $room= Room::where('peopleCount','<',4)->orwhere('roomId',$user->roomId)
            ->orderby('roomId')->get();
        return view('Client.profile',compact(['user','room']));
    }

    public function ListOfNews()
    {
        return view('Client.ListOfNews');
    }

    public function NewsDetail()
    {
        return view('Client.NewsDetail');
    }

    public function BangGia()
    {
        return view('Client.BangGia');
    }

    function List(){
        $news= News::orderBy('created_at','DESC')->take(4)->get();
        return view('Client.index',compact('news'));
    }
    function GetNews(Request $request){
        $slug= $request->slug;
        $news = News::where('slug',$slug)->first();
        return view('Client.newsDetail', compact('news'));
    }
}
