<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login',['title'=>'Đăng nhập hệ thống']);
    }
    public function store(Request $request){
        // tim hieu validate tren trang chu laravel
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        //tim hieu ve authentication trong laravel, Remembering Users
//        if(Auth::attempt([
//            'email' => $request->input('email'),
//            'password' => $request->input('password')
//        ],$request->input('remember'))){
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])){
            Session::flash('success','Login success');
            return redirect()->route('admin');
        }else{
//            return view('admin.users.login',['title'=>'Đăng nhập hệ thống']);
        }

        //session trong laravel
        Session::flash('error','Email hoặc Password k đúng');
        return redirect()->back();

    }
}
