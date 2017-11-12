<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\newsmodel;
use App\Http\Model\newstypemodel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LengthAwarePaginator;
use DB;

class NewsTypeController extends Controller
{
    /**
     * 新闻列表首页
     */
    public function news($name,Request $request)
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

        //如果传入一级板块名 就查询其下面的所有二级板块名下的所有新闻
        if($name){
            $citem = DB::table('category')->where('path1',$name)->get();
            $pid = $citem[0]['type_id'];
            //获取二级板块的Type_id的数组
            $citem = DB::table('category')->where('pid','=',$pid)->get();
            // dump($citem);
            foreach ($citem as $k1 => $v1) {
                // dump($v1);
                $type_id[] = $v1['type_id'];
            }
            //分别获取 获取二级板块下的新闻 并整合在一起 数组合并
            foreach ($type_id as $k2 => $v2) {
                $news[] = DB::table('news')->where('tid','=',$v2)->get();
                foreach ($news[$k2] as $k3 => $v3) {
                    $newslist[] = $v3;
                    // dump($v3);
                }
            }
            // dd($newslist);

            // 自定义数组的分页 数组分页
            $perPage = 15;
            if ($request->has('page')) {
                $current_page = $request->input('page');
                $current_page = $current_page <= 0 ? 1 :$current_page;
            } else {
                $current_page = 1;
            }
            $item = array_slice($newslist, ($current_page-1)*$perPage, $perPage); //代码中的重点是$item，如果不做注释1处理，得出的是所有7条数据。
            $total = count($newslist);
            $paginator =new LengthAwarePaginator($item, $total, $perPage, $currentPage, [
                'path' => Paginator::resolveCurrentPath(), //注释2处就是设定个要分页的url地址。也可以手动通过 $paginator ->setPath('路径') 设置。
                'pageName' => 'page',
            ]);
            $newslist = $paginator->toArray()['data'];
            // return view('newslist', compact('newslist', 'paginator'));
            return view('Home.News.news',compact('string','newslist','paginator'));
        }else{
            //查询所有新闻
            $newslist = DB::table('news')->paginate(15);
            // dd($newslist);
            return view('Home.News.news',compact('string','newslist'));
        }



        // dd($news);
        // return view('Home.News.news',compact('string','newslist'));
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
