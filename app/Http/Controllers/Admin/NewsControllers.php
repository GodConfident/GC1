<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\newsmodel;
use DB;
use Illuminate\Http\Request;

class NewsControllers extends Controller
{
    /**
     *
     * 新闻列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接受值
        $count = $request -> input('count',9);
        $search = $request -> input('search','');
        $req = $request -> all();
        //构造器两表关联查询+分页
        $data = DB::table('news')->join('category', 'news.tid', '=', 'category.type_id')->where('title','like','%'.trim($search).'%')->paginate(9);
        // $data = self::indexcode();
        // dd($data);
        return view('Admin.News.newslist', ['title' => '新闻列表页', 'data' => $data,'req'=>$req]);
        // return view('Admin.layout.index',['title'=>'后台首页']);
    }
    /**
     * 新闻显示隐藏
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function nshow($id)
    {
        $data = newsmodel::find($id);
        //nstatus 1为显示 2为隐藏
        if ($data->nstatus == 1) {
            $res = $data->update(['nstatus' => 2]);
            if ($res) {
                return 1; //隐藏成功
            } else {
                return 3; //操作失败
            }
        } else {
            $res = $data->update(['nstatus' => 1]);
            if ($res) {
                return 2; //显示成功
            } else {
                return 3; //操作失败
            }
        }
    }

    /**
     * 添加新闻页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新闻表查询
        $data = self::codes();
        // dd($data);
        return view('Admin.News.newsAdd', compact('data'));
    }

    /**
     * 添加新闻ing
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input          = $request->input();
        $arr['title']   = $input['title'];
        $arr['tid']     = $input['interest'];
        $arr['content'] = $input['content'];
        //获取新闻封面图 图片路径
        preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/iU', $input['content'], $match);
        if ($match) {
            $arrsrc         = substr($match[1], 1);
            $arr['img']     = $arrsrc;
        }

        $arr['nstatus'] = 1;
        $res            = newsmodel::insert($arr);
        if ($res) {
            // 接受值
            $count = $request -> input('count',9);
            $search = $request -> input('search','');
            $req = $request -> all();
            //构造器两表关联查询+分页
            $data = DB::table('news')->join('category', 'news.tid', '=', 'category.type_id')->where('title','like','%'.trim($search).'%')->paginate(9);
            // $data = self::indexcode();
            // dd($data);
            return view('Admin.News.newslist', ['title' => '新闻列表页', 'data' => $data,'req'=>$req]);
        } else {
            return back()->with("msg", "添加失败");
        }
    }

    /**
     * 查看新闻
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
        echo "show";
    }

    /**
     * 新闻编辑页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsid = $id;
        //构造器两表关联查询
        $data = DB::table('news')->join('category', 'news.tid', '=', 'category.type_id')->get();
        foreach ($data as $key => $value) {
            // dd($value['nstatus']);
            if ($value['nstatus'] == 1) {
                $data[$key]['nstatus'] = '<a class="layui-btn layui-btn-mini layui-btn-warm" onclick="nshow(' . $value['id'] . ')"' . $value['id'] . '" > 隐藏新闻</a>';
            } else {
                $data[$key]['nstatus'] = '<a class="layui-btn layui-btn-mini layui-btn-normal" onclick="nshow(' . $value['id'] . ')"' . $value['id'] . '" > 显示新闻</a>';
            }
        }
        // dd($data);
        foreach ($data as $k1 => $v1) {
            foreach ($v1 as $k2 => $v2) {
                if ($v2 == $newsid) {
                    $fill = $data[$k1];
                }
            }
        }
        return view('Admin.News.newsedit', compact('data', 'fill'));
    }
    /**
     * 代码复用
     */

    public function codes()
    {
        //新闻表查询
        $data = DB::select('select type_id,type,bpath,pid,tstatus,concat(bpath,"-",type_id) as bpath from category order by bpath');
        // dd($data);
        foreach ($data as $k => $v) {
            //处理bpath字段
            $v['bpath']       = preg_replace('/\d+/', '', str_replace('-', '|---------', $v['bpath'])) . $v['type'];
            $data[$k]['type'] = substr($v['bpath'], 10);
        }
        return $data;
    }
    /**
     * 新闻编辑ing
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->input();
        //获取新闻封面图 图片路径
        preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/iU', $input['content'], $match);
        $input['img'] = substr($match[1], 1);
        $res          = DB::table('news')
                        ->where('id', $id)
                        ->update(['title' => $input['title'], 'content' => $input['content'], 'img' => $input['img'], 'tid' => $input['interest'], 'nstatus' => 1, 'updated_at' => date('Y-m-d H:i:s', time())]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = newsmodel::find($id);
        $res = $del -> delete();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
}
