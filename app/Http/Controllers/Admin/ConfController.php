<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Config;
use Illuminate\Http\Request;

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
            //                    根据当前这条网站配置记录中的conf_tpyp的值来决定这条记录在前台列表中显示的样式
            // if ($v->conf_order) {
            //     $v['conf_order'] = '<div class="layui-form-item">  <input placeholder="' . $v->conf_order . '"  autocomplete="off" class="layui-input" name="conf_order" type="phone"/> </div>';
            // }
            switch ($v->conf_type) {
//                    此配置项如果是单选按钮,返回一个
                //                    <input type="text" class="lg" name="conf_content[]" value="400-123-123">
                case 'input':
                    // dd($v->conf_content);
                    // $v['_content'] = '<input type="text" class="lg" name="conf_content[]" value="' . $v->conf_content . '">';
                    $v['conf_content'] = '<div class="layui-form-item">  <input  placeholder="' . $v->conf_content . '"  autocomplete="off" class="layui-input" name="conf_content[]" type="phone"/> </div>';
                    break;
                //    此配置项如果是文本框类型，返回
                //                    <textarea type="text" class="lg" name="conf_content[]"></textarea>
                case 'textarea':
                    // $v['conf_content'] = '<textarea type="text" class="lg" name="conf_content[]">' . $v->conf_content . '</textarea>';
                    $v['conf_content'] = '  <div class="layui-form-item layui-form-text"><textarea placeholder="' . $v->conf_content . '" class="layui-textarea" name="conf_content[]"></textarea></div>';
                    break;
                //  此配置项如果是单选按钮类型，返回
                //  1|开启,0|关闭 =======>
                //                    0 => "1|开启"  ===>   0=>1,1=>开启
                //                    1 => "0|关闭"
                //                  <input type="radio" name="conf_content[]" value="1">开启
                //                  <input type="radio" name="conf_content[]" value="0">关闭
                case 'radio':
//                  $v->field_value
                    $arr = explode(',', $v->conf_value);
                    // dd($arr);
                    //                定义一个变量来接收格式化后的数据
                    $str = '';
                    foreach ($arr as $m => $n) {
                        $r = explode('|', $n);
                        // 判断此次变量的这个元素是否应该被选中
                        $c = ($v->conf_content == $r[0]) ? 'layui-form-radioed' : '';
                        // dd($r);
                        // $str.='<div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>input</span></div>';
                        // $str .= '<div class="layui-unselect layui-form-radio' . $c . '"><i class="layui-anim layui-icon"></i><span>' . $r[1] . '</span></div>';
                        $str .= '<input  type="radio"   name="conf_content[]" value="' . $r[0] . '">' . $r[1] . '&nbsp;';
                        // $str .= ' <input  type="radio"   name="conf_content[]" value="' . $r[0] . '">' . $r[1] . '&nbsp;';
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
               $input = $request->all();
                dd($input);
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
        // echo "create";
        dd($_GET);
        $conf = Config::all();
        // return view('Admin.Set.set');
    }

    /**
     * Store a newly created resource in storage.
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
        // dd($_POST);
        // $conf->conf_title = $_POST['conf_title'];
        // $conf->conf_name = $_POST['conf_name'];
        // $conf->conf_content = $_POST['conf_content'];
        // $conf->conf_value = $_POST['conf_value'];
        // $conf->conf_tips = $_POST['conf_tips'];
        // $conf->conf_order = $_POST['conf_order'];
        // $conf->conf_type = $_POST['conf_type'];
        // $yes = $conf->save();
        if ($re) {
            //成功 调回列表页
            return redirect("admin/conf");
        } else {
            //失败 返回添加页面
            return back()->with('msg', '添加失败');
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
