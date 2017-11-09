<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
         return view('Admin.admin');
    }
    public function Content(Request $req)
    {
        $server['os']= php_uname();
        $server['phpv']= PHP_VERSION;
        $server['HTTP_Server']= $_SERVER['SERVER_SOFTWARE'];
        $server['Server_Language']= $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $server['time']= date('Y-m-d H:i:s');
        $server['Server_time']= $_SERVER['DOCUMENT_ROOT'];
        $server['Server_cpky']= round(disk_free_space('/')/1024/1024/1024,2);
        $server['Server_cpkj']= round(disk_total_space('/')/1024/1024/1024,2);
        $server['Server_ip']= $_SERVER["SERVER_ADDR"].':'.$_SERVER['SERVER_PORT'];
        $server['Server_name']=$_SERVER['SERVER_NAME'];
        $server['POST']=ini_get('post_max_size');
        $server['upload']=ini_get('upload_max_filesize');
        return view('Admin.Index.index',['Server'=>$server]);
    }
    public function set(){
        return view('Admin.Set.set');
    }
    public function sensitive(){
        return view("Admin.Set.sensitive");
    }
    /**
     * public function index()
    {
        return view('Admin.layout.index',['title'=>'后台首页']);
    }

     */
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
