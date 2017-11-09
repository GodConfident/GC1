<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\bbstypemodel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class bbstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=bbstypemodel::orderBy('rank', 'asc')->get();;
        return view('Admin.bbs.type',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.bbs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->get('title');
        $demo=new bbstypemodel();
        $demo->title= $request->get('title');
        $demo->rank=bbstypemodel::max('rank')+1;
        if($demo->save()){
            return redirect('/admin/bbs/type')->with('ico',1)->with('text','添加成功');
        }else{
            return redirect('/admin/bbs/type')->with('ico',2)->with('text','添加失败');
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
        $data=bbstypemodel::find($id);
        $data->title=$request->get('title');
        $data->rank=$request->get('rank');
        if($data->save()){
            return redirect('/admin/bbs/type')->with('ico',1)->with('text','更新成功');
        }else{
            return redirect('/admin/bbt/type')->with('ico',2)->with('text','更新失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re = bbstypemodel::find($id)->delete();
        if($re){
            return 1;
        }else{
            return 0;
        }
    }
}
