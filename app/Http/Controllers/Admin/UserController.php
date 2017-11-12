<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserInfo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req)
    {
        $arr=['','username','nickname','email','phone'];
        $keywords=$req->input('keywords','');
        $key=$req->input('key','0');
        $search=$arr[$key];
        $users=[];
        if(trim($search)==''){
            $users=\DB::table('user')->join('userinfo','user.id','=','userinfo.id')
                ->where('deleted_at','=',null)
                ->where(function($query) use($keywords){
                    $query->where('username','like','%'.$keywords.'%')
                    ->orWhere('nickname','like','%'.$keywords.'%')
                    ->orWhere('email','like','%'.$keywords.'%')
                    ->orWhere('phone','like','%'.$keywords.'%');
                })->orderBy('user.id','desc')->paginate(10);
        }else{
            $users=\DB::table('user')->join('userinfo','user.id','=','userinfo.id')
            ->where('deleted_at','=',null)
            ->where($search,'like','%'.$keywords.'%')
            ->orderBy('user.id','desc')
            ->paginate(10);
        }
        $status=['未激活','正常','冻结'];
        $page=$req->input('page','1');
        return view('Admin.User.index',['users'=>$users,'page'=>$page,'key'=>$key,'keywords'=>$keywords,'index'=>1,'status'=>$status]);
    }
    public function del(Request $req){
        $search=$req->input('search','');
        if($search){
            $users=User::onlyTrashed()->where(function($query) use($search){
                $query->orWhere('username','like','%'.$search.'%')
                    //->orWhere('email','like','%'.$search.'%')
                    //->orWhere('phone','like','%'.$search.'%')
                    ;
            })->paginate(10);
        }else{
            $users=User::onlyTrashed()->paginate(10);
        }

        return view('Admin.User.del',compact('users','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $this->validate($request,[
            'username'=>'required|unique:user|regex:/^\w{6,18}$/',
            //'email'=>'required|regex:/^\w{3,}@\w{2,}\.\w{2,3}$/',
            'phone'=>'required|regex:/^1[3,5,7,8]\d{9}$/',
        ]);
        $username=$request->input('username');
        // $email=$request->input('email');
        $phone=$request->input('phone');
        $sex=$request->input('sex');

        $user=new User();
        $user->username=$username;
        // $user->email=$email;
        $user->phone=$phone;
        $res1=$user->save();

        $userinfo=new UserInfo();
        $userinfo->sex=$sex;
        $res2=$userinfo->save();

        if($res1){
            return back()->with('errors','用户添加成功');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user=User::find($id);
        //dump($user);
        $res=0;
        if($user){
            $user->status=2;
            $user->save();
            $res=$user->delete();
            if($res){
                return 1;
            }else{
                return 0;
            }
        }
        $user=User::onlyTrashed()->find($id);
        $res=$user->forceDelete();
        return 1;
    }
    public function checkUsername(Request $req)
    {
        $username=$req->input('username');
        $res=User::where('username','=',$username)->get();

        if($res->first()){
            return 1;
        }else{
            return 0;
        }
    }

    public function recover(Request $req)
    {
        $id=intval( $req->input('id'));
        $user=User::onlyTrashed()->find($id);
        if($user){
            $user->deleted_at=null;
            $user->status=1;
            $user->save();
            return 1;
        }else{
            return 0;
        }
    }
}
