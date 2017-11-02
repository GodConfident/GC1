<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\newstypemodel;

class NewsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "newstype";
        $data = newstypemodel::all();
        // $data = $data ->get();
        // dd($data);
  //        foreach ($data as $k) {
		//     echo $k->id." ";
		//     echo $k->type." ";
		//     echo $k->tstatus." <br>";
		// }
        return view('Admin.News.news_type',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $data =  newstypemodel::find($id);
        // dd($data);
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
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
}