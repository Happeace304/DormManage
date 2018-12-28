<?php

namespace App\Http\Controllers\Admin;

use App\Model\News;
use \Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    function List(){
        $news= News::orderBy('created_at','ASC')->paginate(10);
        return view('Admin.QuanLyTinTuc.danhSachTinTuc',compact('news'));
    }
    function NewsDetail(Request $request){
        $news= News::where('slug',$request->slug)->first();
        return view('',compact('news'));
    }
    function AddTinTuc(){
        $action= URL::route('SaveTinTuc');
        return view('Admin.QuanLyTinTuc.AddTinTuc',compact('action'));
    }
    function SaveTinTuc(Request $request){
        if($request->hasFile('image')){
            $filename = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('image'), $filename);
        }else $filename='';
        $news = new News([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
            'userId'=> $request->input('userId'),
            'slug'=>str_slug($request->title,'-'),
            'imgLink'=>$filename
        ]);
        $news->save();
        return redirect()->route('DanhSachTinTuc');
    }
    function EditForm(Request $request){
        $news= News::findorFail($request->id);

        return view('',compact('news'));
    }
    function SearchTinTuc(Request $request){
        $title = $request->TieuDe;

        $news = News::where('title','LIKE' ,'%'. $title.'%')->orderBy('created_at','desc')->paginate(10);
        $news->appends(['TieuDe'=>$title]);
        return view('Admin.QuanLyTinTuc.danhSachTinTuc',compact('news'));
    }
    function Delete(Request $request){
        $news= News::findOrFail($request->id);
        if($news->delete())
            return redirect()->back();

    }
}
