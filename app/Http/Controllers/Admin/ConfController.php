<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Config;
use Illuminate\Http\Request;
use DB;

class ConfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 模型排序
        $conf = Config::orderBy('conf_order')->get();
        // dd($conf);
        foreach ($conf as $k => $v) {
            // dd($v);
            switch ($v->conf_type) {
                case 'input':
                    $v['conf_content'] = '<input  value="' . $v->conf_content . '"  autocomplete="off" class="layui-input" name="'.$v->id.'" type="input" />';
                    break;
                case 'textarea':
                // dd($v->conf_content);
                    $v['conf_content'] = '<textarea  placeholder="' . $v->conf_content . '" class="layui-textarea" name="'.$v->id.'">' . $v->conf_content . '</textarea>';
                    break;
                //  此配置项如果是单选按钮类型，返回
                //  1|开启,0|关闭 =======>
                //                    0 => "1|开启"  ===>   0=>1,1=>开启
                //                    1 => "0|关闭"
                //                  <input type="radio" name="conf_content[]" value="1">开启
                //                  <input type="radio" name="conf_content[]" value="0">关闭
                case 'radio':
                    $arr = explode(',', $v->conf_value);
                    $str = '';
                    // dd($v);
                    foreach ($arr as $m => $n) {
                        $r = explode('|', $n);
                        // dd($n);
                        // 判断此次变量的这个元素是否应该被选中
                        // dd($v->conf_content);
                        // dd($v->id);
                        $c = ($v->conf_content == $r[0]) ? 'checked' : '';
                        // dd($c);
                        // dd($r);//1|开启,2|关闭
                          $str .= '<input type="radio" name="'.$v->id.'" value="' . $r[0] . '" title="' . $r[1] . '" '.$c.' lay-filter="confradio" > &nbsp;<input class="weboff" type="hidden" value='.$v->id.'>';
                    }
                    $v['conf_content'] = $str;
                    break;
            }
        }
        // dd($conf);
        return view('Admin.Set.set', compact('conf'));
    }

/**
 * 在列表页直接修改web配置方法
 */
    public function webchange(Request $request)
    {
        $input = $request->except('_token','conf_order');
        $a = 0;
        foreach ($input as $ka => $va) {
            // dd($va);
            $conf_contentadd = DB::table('webinfo')->where('id',$ka)->update(['conf_content'=>$va ]);
            // dd($conf_contentadd);
            if($conf_contentadd){
                $a++;
            }else{
                $a--;
            }
        }
            if($a >= -5){
                $msg = "修改成功！";
            }else{
                $msg = "修改失败！";
            }
            // dd($a);
// 模型排序
        $conf = Config::orderBy('conf_order')->get();
        // dd($conf);
        foreach ($conf as $k => $v) {
            // dd($v);
            switch ($v->conf_type) {
                case 'input':
                    $v['conf_content'] = '<input  value="' . $v->conf_content . '"  autocomplete="off" class="layui-input" name="'.$v->id.'" type="input" />';
                    break;
                case 'textarea':
                // dd($v->conf_content);
                    $v['conf_content'] = '<textarea  placeholder="' . $v->conf_content . '" class="layui-textarea" name="'.$v->id.'">' . $v->conf_content . '</textarea>';
                    break;
                //  此配置项如果是单选按钮类型，返回
                //  1|开启,0|关闭 =======>
                //                    0 => "1|开启"  ===>   0=>1,1=>开启
                //                    1 => "0|关闭"
                //                  <input type="radio" name="conf_content[]" value="1">开启
                //                  <input type="radio" name="conf_content[]" value="0">关闭
                case 'radio':
                    $arr = explode(',', $v->conf_value);
                    $str = '';
                    // dd($v);
                    foreach ($arr as $m => $n) {
                        $r = explode('|', $n);
                        // dd($n);
                        // 判断此次变量的这个元素是否应该被选中
                        // dd($v->conf_content);
                        // dd($v->id);
                        $c = ($v->conf_content == $r[0]) ? 'checked' : '';
                        // dd($c);
                        // dd($r);//1|开启,2|关闭
                          $str .= '<input type="radio" name="'.$v->id.'" value="' . $r[0] . '" title="' . $r[1] . '" '.$c.' lay-filter="confradio" > &nbsp;<input class="weboff" type="hidden" value='.$v->id.'>';
                    }
                    $v['conf_content'] = $str;
                    break;
            }
        }
        // dd($conf);
        return view('Admin.Set.set', compact('conf','msg'));
    }
    /**
     * 返回添加网站配置页
     *,
     * @return view
     */
    public function websetadd()
    {
        // echo "getWebsetadd";
        return view('Admin.Set.websetadd');
    }
    /**
     * 添加网站配置ing
     * @return [type] [description]
     */
    public function create()
    {
        dd($_GET);
        $conf = Config::all();
        // return view('Admin.Set.set');
    }

    /**
     * 添加网站配置
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        // dd($input);
        $conf = new Config;
        $re   = Config::create($input);
        if ($re) {
            //成功 调回列表页
            return redirect("admin/conf")->with('msg','添加成功！');
        } else {
            //失败 返回添加页面
            return back()->with('msg', '添加失败！');
        }
    }

    /**
     * 网站开关
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Config::find($id);
        $res = $data->conf_content;
        if ($res == 1) {
            $data ->conf_content = 2;
            $s = $data->save();
            if ($s) {
                return 2;
            }
        }else{
            $data ->conf_content = 1;
            $s = $data->save();
            if ($s) {
                return 1;
            }
        }
    }

    /**
     * 编辑网站配置重新排序
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id,$conf_order);
        // echo "edit";
        $conf = new Config;
        // dd($conf);
        $b = $_GET['conf_order'];
        // return $b;
        $re = $conf -> where('id',$id) -> update(['conf_order'=>$b]);
        // return $b;
        // App\Flight::where('active', 1)
          // ->where('destination', 'San Diego')
          // ->update(['delayed' => 1]);
        if ($re) {
            return 1;
        }else{
            return 2;
        }
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
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $res = DB::table('webinfo')->where('id','=',$id)->delete();
        // $del = new Config;
        // $res = $del ->where('id','=',$id) -> delete();
        if ($res) {
            return 1;
        }else{
            return 2;
        }
    }
}
