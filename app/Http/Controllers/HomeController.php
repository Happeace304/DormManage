<?php

namespace App\Http\Controllers;

use App\Model\Bill;
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
    {   $news= News::where('state',1)->orderBy('created_at','desc')->paginate(10);
        return view('Client.ListOfNews', compact('news'));
    }


    public function BangGia()
    {
        return view('Client.BangGia');
    }

    public function LienHe()
    {
        return view('Client.contact');
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
        $relate= News::where('state',1)->where('created_at','<',$news->created_at)->orderBy('created_at','desc')->take(2)->get();
        return view('Client.newsDetail', compact(['news','relate']));
    }
    function GetNotification(){
        $money = Bill::where('roomId', Auth::user()->roomId)->where('state', 1)->orderby('month', 'desc')->first();
        $expire= new \Illuminate\Support\Carbon(Auth::user()->expire_date);
        $now =\Illuminate\Support\Carbon::now();

        $count=0;
        if($money !=null ){$count++;}
        $isExpired=null ;
        if ($now<=$expire&&$now->diffinDays($expire)<7)  {
            $isExpired=1;
            $count++;
        }
        if($now>$expire ){
            $isExpired=0;
            $count++;
        }

        return compact(['money','isExpired','count','expire']);
    }
    function SearchNews(Request $request){
        $title= $request->TieuDe;
        $news = News::where('state',1)->where('title','like','%'.$title.'%')->orderBy('created_at', 'DESC')->paginate(10);
        return view('Client.ListOfNews', compact('news'));
    }
}
