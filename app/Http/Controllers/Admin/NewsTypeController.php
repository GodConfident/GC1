<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\newstypemodel;

class NewsTypeController extends Controller
{
    /**
     * 用无限极分类显示板块列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //无限级分类

        $data = newstypemodel::orderBy('path')->get();
        foreach ($data as $k => $v) {
            // $a = substr_count($v->path,'-').'<br>';
            // 把 - 替换 为 ---|
            $a = str_replace('-','---------|',$v->path);
            //正则过滤 数字
            $pattern  =  ' /\d+/';
            $b = preg_replace($pattern,'', $a);
            $v->type =  $b.$v->type;
        }
        return view('Admin.News.news_type',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data =  newstypemodel::orderBy('id')->find($id);
        // return view('admin.user.edit',['title'=>'用户修改','user'=>$user]);
        return view('/Admin.News.newstypeedit',compact('data'));
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
        echo "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //接受用户id
        // $user = newstypemodel::find($id);
        // // 错误处理
        // if($user->delete()){
        //     return redirect('/admin/newstype')->with('success','删除成功');
        // }else{
        //     return back()->with('error','删除失败');
        // }
 // echo  $id;
        $data = [];
        $re = newstypemodel::find($id)->delete();
        if($re){
            $data=[
                'status'=>1,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>2,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
}
