<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\newstypemodel;
use DB;
use Illuminate\Http\Request;
use Input;

class NewsTypeController extends Controller
{
    /**
     * 无限极分类查询语句
     * @return [type] [description]
     */
    public function tdata()
    {
        $data = DB::select('select type_id,type,bpath,pid,tstatus,concat(bpath,"-",type_id) as bpath from category order by bpath');
        // dd($data);
            foreach ($data as $k => $v) {
            //处理bpath字段
            $v['bpath']       = preg_replace('/\d+/', '', str_replace('-', '|---------', $v['bpath'])) . $v['type'];
            $data[$k]['type'] = substr($v['bpath'], 10);
            //处理板块状态
            //有子版块的不给显示 状态按钮 和删除按钮
            foreach ($data as $ks => $vs) {
                $arrpid[] = $vs['pid'];
            }
            //去除重复的值
            $arrpid = array_unique($arrpid);
            //如果type_id有对应的pid 则隐藏 删除按钮和隐藏按钮
            $ifbnt = in_array($v['type_id'], $arrpid);
            if(!$ifbnt){
                if ($v['tstatus'] == 1) {
                    $data[$k]['tstatus'] = '<a class="layui-btn layui-btn-mini layui-btn-warm" onclick="bshow(' . $v['type_id'] . ')"' . $v['type_id'] . '/edit/" > 隐藏板块</a>';
                } else {
                    $data[$k]['tstatus'] = '<a class="layui-btn layui-btn-mini layui-btn-normal" onclick="bshow(' . $v['type_id'] . ')"' . $v['type_id'] . '/edit/" > 显示板块</a>';
                }
                $data[$k]['bdel'] = '<button class="layui-btn layui-btn-mini layui-btn-danger" onclick="tdel('.$v['type_id'].')" ><i class="layui-icon">&#xe640;</i> 删除</button>';
            }else{
                $data[$k]['tstatus'] = '';
                $data[$k]['bdel'] = '';
            }
        }
        return $data;
    }
    // trait()
    /**
     * 用无限极分类显示板块列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //代码复用
        $data = self::tdata();
        return view('Admin.News.news_type', compact('data'));
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
    }

    /**
     * 添加子板块ing
     * @param  Request $request [id]
     * @param  path
     * @param  type 板块名
     * @return string
     */
    public function addtype(Request $request)
    {
        $input = $request->input();
        // dd($input);
        //限制不能为空
        if($input['title']==null){
                return back()->with('errors','不能为空！');
        }
        $data           = newstypemodel::where('type_id','=',$input['interest'])->get();
        // dd($data);
        //限制子级层级
        foreach ($data as $ks => $va) {
                    // dd($va['bpath']);
            $a = substr_count($va['bpath'], '-');
            if($a>=2){
                return back()->with('errors','层级限制在三级及三级以内！');
            }
        }

        // dd($data[0]->type_id);
        //限制子级板块数量
        $cdata = newstypemodel::where('pid','=',$data[0]->type_id)->get();
        foreach ($cdata as $k => $v) {
            if($k>=9){
                return back()->with('errors','子级板块不能多于10个！');
            }
        }
        $add['bpath']   = $data->bpath   = $data[0]->bpath . '-' . $input['interest'];
        $add['type']    = $input['title'];
        $add['pid']     = $input['interest'];
        $add['tstatus'] = 1;
        $res            = newstypemodel:: insert($add);
        if ($res) {
            $msg  = "板块添加成功";
            $data = self::tdata();
            return view('Admin.News.news_type', compact('msg', 'data'));
        } else {
            $msg  = "板块添加失败";
            $data = self::tdata();
            return view('Admin.News.addnewstype', compact('msg', 'data'));
        }


    }
    /**
     * 添加子板块
     * @param  id父级
     * @param  bpath
     * @param  type 板块名
     * @return string
     */
    public function show($id)
    {
        // echo $id;
        $data = self::tdata();
        return view('Admin.News.addnewstype', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = newstypemodel::orderBy('type_id')->where('type_id','=',$id)->get();
        return view('/Admin.News.newstypeedit', compact('data'));
    }
    /**
     * Update 板块修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->input();
        $input = $request->except('_token');
        // dd($data);
        $res = newstypemodel::where('type_id', $id)->update(['type' => $input['title']]);
        if ($res) {
            $msg  = "板块名更新成功";
            $data = self::tdata();
            return view('Admin.News.news_type', compact('data', 'msg'));
        }else{
            // $msg  = "板块名更新失败";
            $data = self::tdata();
            return back()->with('errors','板块修改失败，再试试！')->with('data',$data);
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
        $data = [];
        $data   = newstypemodel::find($id);
        // dd($data);
        // //有子级板块的不能删除
        // $zpid = $data->pid;
        // dd($zpid);
        $re = $data -> delete();
        if ($re) {
            $data = [
                'status' => 1,
                'msg'    => '删除成功',
            ];
        } else {
            $data = [
                'status' => 2,
                'msg'    => '删除失败',
            ];
        }
        return $data;
    }
    /**
     * 板块隐藏显示方法
     */
    public function bshow($id)
    {
        // return $id;
        $data = newstypemodel::find($id);
        if ($data->tstatus == 1) {
            $data->tstatus = '2';
            $data->save();
            return 2;
        } else {
            $data->tstatus = '1';
            $data->save();
            return 1;
        }
    }

}
