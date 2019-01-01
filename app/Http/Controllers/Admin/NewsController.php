<?php

namespace App\Http\Controllers\Admin;

use App\Model\News;
use App\Model\User;
use Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    function List(){
        $news= News::orderBy('created_at','ASC')->paginate(10);
        foreach ($news as $item){
            $item->user = User::findorfail($item->userId)->name;
        }
        return view('Admin.QuanLyTinTuc.danhSachTinTuc',compact('news'));
    }
    function NewsDetail(Request $request){
        $news= News::where('slug',$request->slug)->first();
        return view('',compact('news'));
    }
    function AddTinTuc(){
        $action= URL::route('SaveTinTuc');
        return view('Admin.QuanLyTinTuc.addEditTinTuc',compact('action'));
    }
    function SaveTinTuc(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required',
            'title' => 'required|max:255|string',
            'content' => 'required|max:1000|min:3',
        ]);

        if($request->hasFile('image')){
            $filename = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('image/news'), $filename);
        }else $filename='';
        $news = new News([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
            'userId'=> $request->input('userId'),
            'slug'=>str_slug($request->title,'-'),
            'imgLink'=>$filename
        ]);
        if($news->save())
        return redirect()->route('DanhSachTinTuc');
    }
    function EditFormTinTuc(Request $request){
        $news= News::findorFail($request->id);
        $action= URL::route('SaveEditTinTuc');
        return view('Admin.QuanLyTinTuc.addEditTinTuc',compact(['action','news']));
    }
    function SaveEdit(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:255|string',
            'content' => 'required|max:1000|min:3',
        ]);

        if($request->hasFile('image')){
            $filename = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('image/news'), $filename);

        }else $filename= $request->old_image;
       $news=News::findorfail($request->newsId);
       $news->title= $request->title;
       $news->content= $request->input('content');
       $news->slug= str_slug($request->title,'-');
        $news->imgLink= $filename;
        if($news->save()){
            if (File::exists(public_path('image/avatar') . '/' . $request->old_image)) {
                File::delete(public_path('image/avatar') . '/' . $request->old_image);
            }
        }
            return redirect()->route('DanhSachTinTuc');
    }
    function SearchTinTuc(Request $request){
        $title = $request->TieuDe;

        $news = News::where('title','LIKE' ,'%'. $title.'%')->orderBy('created_at','desc')->paginate(10);
        foreach ($news as $item){
            $item->user = User::findorfail($item->userId)->name;
        }
        $news->appends(['TieuDe'=>$title]);
        return view('Admin.QuanLyTinTuc.danhSachTinTuc',compact('news'));
    }
    function Delete(Request $request){
        $news= News::findOrFail($request->id);
        if($news->delete())
            return redirect()->back();

    }
    function MassDelete(Request $request){
        $res = explode(',', $request->array);

        $news = News::whereIn('newsId',$res)->get();
        foreach ($news as $item){
            $item->delete();
        }
        return redirect()->back();
    }
}
