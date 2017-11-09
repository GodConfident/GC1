<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use Hash;
class LoginController extends Controller
{
    public function getIndex()
    {
       return view('Admin.login',['title'=>'后台登陆']);
    }
    public function postDologin(Request $req)
    {

        // 表单数据验证

        $this->validate($req,[
            'username'=>'required|regex:/\w{6,18}/',
        ],[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确'
        ]);
        // 判断验证码是否一致
        $code=$req->input('check');
        if( strtolower($code) != session()->pull('code') ){
            return back()->withInput();
        }

        $username=trim($req->input('username'));
        $password=$req->input('password');

        //  验证用户名
        $res=User::where('username','=',$username)->orWhere('email','=',$username)->first();
        $flag=false; // 记录用户名与密码是否错误
        if($res){

            //验证状态
            if($res->status==0){
                session(['user'=>$res]);
                return redirect('/admin/activation');
            }elseif($res->status==2){
                return back()->withInput()->with('errors','账户已冻结');
            }else{
                //验证密码 Hash::check()
                if(!Hash::check($password,$res->password)){
                    $flag=true;
                }

            }
        }else{
            $flag=true;
        }
        // 用户或密码错误
        if($flag){
            $req->flashOnly('username');
            return back()->withInput()->with('errors','用户或密码错误');
        }
        session(['isLogin'=>true]);
        return redirect('/admin');
    }


    public function postCheck(Request $req)
    {
        $code=$req->input('code');
        if(strtolower($code)==session('code')){

            return 1;
        }else{
            return 0;
        }
    }
}
