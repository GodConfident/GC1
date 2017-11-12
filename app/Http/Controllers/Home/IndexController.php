<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// use App\Http\Model\newstypemodel;
use DB;
class IndexController extends Controller
{
    /**
     * 首页
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
    	//查询一级级板块名
        $newstype = DB::table('category')->where('pid',48)->where('tstatus',1)->select('type','path1')->get();
        $string = '';
        for($n=count($newstype),$i=0;$i<$n;$i++){
            if($i%2){continue;}
            if($newstype[$i+1]['type']){
                $string .= '<div class="col">
                            <a href="news/'. $newstype[$i]['path1'].'">'. $newstype[$i]['type'].'</a>
                            <a href="news/'. $newstype[$i+1]['path1'].'">'. $newstype[$i+1]['type'].'</a>
                        </div>';
            }else{
                $string .= '<div class="col">
                            <a href="'. $newstype[$i]['path1'].'">'. $newstype[$i]['type'].'</a>
                        </div>';
            }
        }

        //焦点关注
        $focus = DB::table('news')->where('tid',57)->paginate(2);
        // dd($focus);
        // foreach ($focus as $key => $value) {
        //     dd($value);
        // }
        return view('Home.index',compact('string','focus'));
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
