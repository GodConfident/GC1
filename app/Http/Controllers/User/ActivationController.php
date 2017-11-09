<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserInfo;
use Hash;
class ActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activation()
    {
        
    }
    public function doactivation()
    {
        
    }
    public function index()
    {
        $str='23456789abcdefghhkmkpqrstuvwxyABCDEFGHIJKLMNQRTUVWXY';
        $code='';
        for($i=0,$l=strlen($str)-1;$i<4;$i++){
            $code.=$str[mt_rand(0,$l)];
        }
        session(['mobile_code'=>$code]);
        return view('Admin.User.activation',compact('code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->input('code')==session('phone_code')){
            
            // 清除session 中的验证码
            // session()->forget('phone_code');
             
            return view('Admin.User.self');
        }else{
            return back()->with('errors','验证码错误');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->input('password')!=$request->input('repassword')){
            return back();
        };
        $user=User::findOrFail(session('user')->id);
        $userinfo=Userinfo::where('uid','=',session('user')->id)->first();
        if(!$userinfo){
            $userinfo=new Userinfo();
        }
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->status='1';
        $user->email=$request->input('email');

        $userinfo->nickname=$request->input('nickname');
        $userinfo->age=$request->input('age');
        $userinfo->img='';
        $userinfo->sex=$request->input('sex');
        $userinfo->uid=session('user')->id;

        $res1=$user->save();
        $res2=$userinfo->save();
        if($res1 && $res2){
            return redirect('/admin/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,$id)
    {   
        $phone=session('user')->phone;
        $str=rand(1000,9999);
        //测试手机号
        $phone='18531247937';

        if($req->input('code')==session('mobile_code')){
            // 发送短信的接口
            $url = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C36919559&password=a7762be47b14d06aca36d9476785e362&mobile='.$phone.'&format=json&content=您的验证码是：'.$str.'。请不要把验证码泄露给其他人。';
            $ch = curl_init();
            // 添加apikey到header
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // 执行HTTP请求
            curl_setopt($ch , CURLOPT_URL , $url);
            $res = curl_exec($ch);
            $arr = json_decode ($res , true);
            // var_dump($res);
            session(['phone_code'=>$str]);
            echo $arr['code'];
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
