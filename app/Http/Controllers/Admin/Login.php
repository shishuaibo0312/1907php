<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    //登录视图
    function login(){
        return view('admin.login.login');
    }
//登陆执行
    // function logindo(request $request){
    //    $post=request()->except('_token');
    //     //dd($post);
    //     // $where=[
    //     //     ['admin_name','=',$post->admin_name],
    //     //     ['admin_pwd','=',$post->admin_pwd]
    //     // ];
    //     $data=Admins::where($post)->first();
    //     if($data){
    //     	 session(['admin'=>$post]); //设置
    //          request()->session()->save();//存储到服务端
    //          $admin=session('admin');
    //          //dd($user);
    //         return redirect('brand/list');
    //     }else{
    //     	return redirect('login/login');
    //     }

// }
    

    function logindo(){
       $post=request()->except('_token');
       //dd($post);
       if(Auth::attempt($post)){
          //$user=Auth::user();
          $user_id=Auth::id();
          //dd($user_id);
             return redirect('brand/list');
       }else{
             return redirect('login/login')->with('msg','账号或密码错误');
       }

    }

}
