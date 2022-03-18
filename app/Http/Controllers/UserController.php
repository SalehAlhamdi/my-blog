<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRgisterRequest;
use App\Models\post;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function register(){
        return view('/auth/register');
    }
    public function registerSubmit(UserRgisterRequest $request){

//        $user=new user();
//        $user->name=$request->username;
//        $user->email=$request->email;
//        $user->password=Hash::make($request->password);

        $user = User::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);


        $save=$user->save();
        if ($save){
            return back()->with('success_add_user','تم تسجيل الحساب بنجاح');
        }
        else{
            return back()->with('fail_add_user','فيه خطاء, الرجاء التاكد من البيانات');

        }
    }
    public function login(){
        return view('/auth/login');
    }
    public function authCheck(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:30'
        ]);
        $userinfo=user::where('email','=',$request->email)->first();
        if($userinfo){
            if(Hash::check($request->password,$userinfo->password)){
                session()->put('LoggedUser',$userinfo->id);
                return redirect(route('dashboard'));
            }
            else{
                return back()->with('fail','كلمة المرور غير صحيحة');
            }
        }
        else{
            return  back()->with('fail','لم يتم تعرف على Email');
        }
    }
    public function dashboard(){

        $data=user::where('id','=',session('LoggedUser'))->first();
        session()->put('lastPosts',post::orderBy('id', 'desc')->take(3)->get());
        $user=user::all();
        $posts=post::all();
        $count=post::all()->count();
        return view('dashboard',compact('data','posts','count','user'));
    }
    public function logoutSubmit(){
        if (session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect(route('dashboard'));
        }
    }
    public function addPost(){
        return view('addpost');
    }
    public function editUser(){
        $user=user::find(session()->get('LoggedUser'));

        return view('edituser',compact('user'));
    }
    public function editUSerSubmit(Request $request){
        $user=user::find(session()->get('LoggedUser'));
        $request->validate([
            'password'=>'required|confirmed|min:5|max:50'
        ]);
        if (!empty($request->name)){
            $user->name=$request->name;
        }
        if (!empty($request->email)){
            $user->name=$request->email;
        }
        if (!empty($request->password)){
            $user->password=Hash::make($request->password);
        }
        $user->save();
        return back()->with('user_updated','تم تحديث حسابك بنجاح');

    }
}
