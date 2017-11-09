<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
  <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
  <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
  <script src="/template/admin/layui/layui.js"></script>
</head>
<body style="padding: 10px;background: #fff;">
  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>添加新闻</legend>
  </fieldset>
  <!-- 添加出错时的报错信息 -->
    <p style="font-size: 30px;color:red">{{$msg or ''}}</p>
    <!-- 限制子级数量的报错信息 -->
    @if(count($errors))
        <p style="font-size: 30px;color:red"> {{$errors}}</p>
    @endif
  <form class="layui-form layui-form-pane" action="/admin/news" method="post">


<div class="layui-form-item" style="width:700px">
  <label class="layui-form-label">新闻标题</label>
  <div class="layui-input-block">
    <input type="text" name="title" lay-verify="title" autocomplete="off" class="layui-input" >
  </div>
</div>



<!-- 加载百度编辑器的容器 -->
    <script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="{{asset('/template/ueditor/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('/template/ueditor/ueditor.all.js')}}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">

var ue = UE.getEditor('container', {
  initialFrameWidth :1100,//初始化宽
  initialFrameHeight:300,//初始化高
  imagePathFormat:"uploadimgs/",
    toolbars: [
        [
          'fullscreen',
          'source',
          'undo',
          'redo',
          'bold',
          'selectall',
          'time',
          'date',
          'simpleupload',
          'insertimage',
          'emotion',//表情
          'justifyleft', //居左对齐
          'justifyright', //居右对齐
          'justifycenter', //居中对齐
          'justifyjustify', //两端对齐
          'inserttable', //插入表格
        ]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true,
});
    </script>

    <div class="layui-form-item" style="margin-top: 20px">
      <label class="layui-form-label" style="width:200px">板块选择</label>
      <div class="layui-input-block" style="margin-left:200px;width:500px">
        <select name="interest" lay-filter="test">
<!--         <option value=""></option>
  <option value="1" selected="">阅读</option> -->
  @foreach ($data as $k =>$v)
  <option value="{{$v['type_id']}}" >{{$v['type']}}</option>
  @endforeach
</select>
</div>
</div>



{{csrf_field()}}
<div class="layui-form-item">
  <div class="layui-input-block">
    <button class="layui-btn" lay-submit="" onclick="newsimg()" lay-filter="demo1">立即提交</button>
    <a type="reset" class="layui-btn layui-btn-primary" href="{{url('admin/news')}}">返回新闻列表</a>
  </div>
</div>
</form>

<script>
  layui.use(['form', 'layedit', 'laydate'], function(){
    var form = layui.form
    ,layer = layui.layer
    ,layedit = layui.layedit
    ,laydate = layui.laydate;
  });

</script>
</body>
</html>