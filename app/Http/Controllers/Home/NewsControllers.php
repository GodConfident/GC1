<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class NewsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news($name)
    {
        //查询一级级板块名
        $newstype = DB::table('category')->where('pid',48)->where('tstatus',1)->select('type','path1')->get();
        $string = '';
        for($n=count($newstype),$i=0;$i<$n;$i++){
            if($i%2){continue;}
            if($newstype[$i+1]['type']){
                $string .= '<div class="col">
                            <a href="'. $newstype[$i]['path1'].'">'. $newstype[$i]['type'].'</a>
                            <a href="'. $newstype[$i+1]['path1'].'">'. $newstype[$i+1]['type'].'</a>
                        </div>';
            }else{
                $string .= '<div class="col">
                            <a href="'. $newstype[$i]['path1'].'">'. $newstype[$i]['type'].'</a>
                        </div>';
            }
        }

        //查询新闻
        $news = DB::table('news')->paginate(15);
        // dd($news);
        return view('Home.News.news',compact('string','news'));
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
