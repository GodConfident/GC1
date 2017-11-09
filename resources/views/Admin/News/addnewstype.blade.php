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
    <legend>添加板块</legend>
  </fieldset>
  <!-- 添加出错时的报错信息 -->
    <p style="font-size: 30px;color:red">{{$msg or ''}}</p>
    <!-- 限制子级数量的报错信息 -->
    @if(count($errors))
        <p style="font-size: 30px;color:red"> {{$errors}}</p>
    @endif
  <form class="layui-form layui-form-pane" action="/admin/newstype/addtype" method="post">
    <div class="layui-form-item">
      <label class="layui-form-label" style="width:200px">父级板块选择</label>
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
<div class="layui-form-item" style="width:700px">
  <label class="layui-form-label">板块名</label>
  <div class="layui-input-block">
    <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入板块名" class="layui-input">
  </div>
</div>
{{csrf_field()}}
<div class="layui-form-item">
  <div class="layui-input-block">
    <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
  </div>
</div>
</form>
<script>
  layui.use(['form', 'layedit', 'laydate'], function(){
    var form = layui.form
    ,layer = layui.layer
    ,layedit = layui.layedit
    ,laydate = layui.laydate;


// form.on('select(filter)', function(data){
//   console.log(data.elem); //得到select原始DOM对象
//   console.log(data.value); //得到被选中的值
//   console.log(data.othis); //得到美化后的DOM对象
// });

  //监听指定开关
  // form.on('switch(switchTest)', function(data){
  //   layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
  //     offset: '6px'
  //   });
  //   layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis);
  // });
  //监听提交
//   form.on('submit(demo1)', function(data){
//     layer.alert(JSON.stringify(data.field), {
//       title: '最终的提交信息'
//     })
//     return false;
//   });

});
 //  function addif(id) {
 //   alert('type_id');
 // }
</script>
</body>
</html>