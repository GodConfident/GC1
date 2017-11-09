<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\singlemodel;

class Singlecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=singlemodel::orderBy('rank', 'asc')->get();
//        dd($data);
        return view("Admin.single.index",['data'=>$data]);
    }

    public function create()
    {
        return view("Admin.single.add");
    }

    public function store(Request $request)
    {
        $demo=new singlemodel();
        $demo->title= $request->get('title');
        $demo->link= $request->get('url');
        $demo->rank=singlemodel::max('rank')+1;
       if($demo->save()){
           return redirect('/admin/single')->with('ico',1)->with('text','添加成功');
       }else{
           return redirect('/admin/single')->with('ico',2)->with('text','添加失败');
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
    public function update(Request $request,$id)
    {
//        dd($request->get('url'));
        $data=singlemodel::find($id);
        $data->title=$request->get('title');
        $data->link=$request->get('url');
        $data->rank=$request->get('rank');
        if($data->save()){
            return redirect('/admin/single')->with('ico',1)->with('text','更新成功');
        }else{
            return redirect('/admin/single')->with('ico',2)->with('text','更新失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $re = singlemodel::find($id)->delete();
        if($re){
            return 1;
        }else{
            return 0;
        }
    }
}
