<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/template/admin/layui/css/layui.css">
	<link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<script src="/template/admin/layui/layui.js"></script>
</head>
<body style="padding: 10px;background: #fff;">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>板块编辑</legend>
    </fieldset>
    @if(count($errors))
        <p style="font-size: 30px;color:red"> {{$errors}}</p>
    @endif
<form class="layui-form" action="/admin/newstype/{{$data[0]->type_id}}" method="POST">

  <div class="layui-form-item">
    <label class="layui-form-label">新板块名</label>
    <div class="layui-input-block">
      <input name="title" lay-verify="title" autocomplete="off" value ="{{$data[0]->type}}" class="layui-input" type="text">
    </div>
  </div>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
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
});

</script>
</div>
<p>　</p>
</body>
</html>