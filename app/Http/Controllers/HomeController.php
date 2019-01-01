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

    public function Home()
    {
        $news = News::where('state', 1)->orderBy('created_at', 'desc')->take(4)->get();
        foreach ($news as $item) {
            $array = explode(".", $item->content);
            $item->sentence = $array[0];
    }
        $feature =News::where('state', 1)->orderBy('created_at', 'desc')->take(2)->get();
        foreach ($feature as $item1) {
            $array = explode(".", $item1->content);
            $item1->sentence = $array[0];
        }
        return view('Client.home',compact(['news','feature']));
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

    function List()
    {
        $news = News::orderBy('created_at', 'DESC')->take(4)->get();
        return view('Client.index', compact('news'));
    }

    function GetNews(Request $request)
    {
        $slug = $request->slug;
        $news = News::where('slug', $slug)->first();
        return view('Client.newsDetail', compact('news'));
    }
}
