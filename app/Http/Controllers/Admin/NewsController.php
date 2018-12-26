<?php

namespace App\Http\Controllers\Admin;

use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    function List(){
        $news= News::orderBy('created_at','ASC')->paginate(10);
        return view('',compact('news'));
    }
    function NewsDetail(Request $request){
        $news= News::where('slug',$request->slug)->first();
        return view('',compact('news'));
    }
    function AddNews(Request $request){
        if($request->hasFile('image')){
            $filename = time().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('image'), $filename);
        }else $filename='';
        $news = new News([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
            'userId'=> Auth::user()->userId,
            'slug'=>str_slug($request->title,'-'),
            'imgLink'=>$filename
        ]);
        $news->save();
        return redirect()->back();
    }
    function EditForm(Request $request){
        $news= News::findorFail($request->id);

        return view('',compact('news');
    }
}
