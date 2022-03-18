<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\b;

class PostController extends Controller
{
    public function addPost(Request $request){
        $request->validate([
           'title'=>'required|min:1',
           'subject'=>'required|min:1'
        ]);
        $post=new post();
        $post->body=$request->subject;
        $post->title=$request->title;
        $post->user_id=$request->session()->get('LoggedUser');
        if ($request->hasFile('file')){
            $img=$request->file('file');
            $imgname=time().'.'.$img->extension();
            $img->move(public_path('images'),$imgname);
            $post->imgProfile=$imgname;
        }
        $post->save();
        return back()->with('success-post','تم نشر المنشور بنجاح');
    }
    public function editPost(){
        $posts_count=post::where('user_id','=',session('LoggedUser'))->count();
        $posts=post::where('user_id','=',session('LoggedUser'))->get();
        return view('editpost',compact('posts','posts_count'));
    }
    public function editPostSubmit(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'subject' => 'required'
        ]);
        $editpost=post::find($request->id);
        $editpost->title=$request->title;
        $editpost->body=$request->subject;
        $editpost->user_id=session('LoggedUser');
        $editpost->save();
        return back()->with('editPost_success','تم تعديل المنشور بنجاح');
    }
    public function fullPost(Request $request){
        $post=post::find($request->id);
        $user=user::all();
        return view('full-post',compact('post','user'));
    }
    public function deletePost(Request $request){
        $delPost=post::find($request->id);
        if (file_exists(asset('images'.'/'.$delPost->imgProfile))){
            unlink(asset('images'.'/'.$delPost->imgProfile));
        }
        $delPost->delete();
        return back()->with('deleted_post','تم حذف المنشور بنجاح ');
    }
}
