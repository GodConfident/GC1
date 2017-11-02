<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/template/admin/layui/css/layui.css">
	<link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<script src="/template/admin/layui/layui.js"></script>
	<script src="/js/jquery-3.2.1.min.js"></script>
</head>
<body style="padding: 10px;">
<div class="user">
	<fieldset class="layui-elem-field layui-field-title">
		<legend>新闻版块</legend>
	</fieldset>

	<blockquote class="layui-elem-quote">

	</blockquote>
	<table id="demo"></table>


<script src="//res.layui.com/layui/dist/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use('layer', function(){
  var layer = layui.layer;

  layer.msg('hello');
});
layui.use('table', function(){
  var table = layui.table;

  //展示已知数据
  table.render({
    elem: '#demo'
    ,data: [
 @foreach ($data as $k )
    {
      "id": "{{ $k->id}}"
      ,"type": "{{ $k->type}}"
      ,"tstatus": "{{ $k->tstatus}}"
      ,"sign": '<button class="layui-btn layui-btn-warm layui-btn-small" onclick="tdel({{ $k->id}})">修改</button><button class="layui-btn layui-btn-danger layui-btn-small">删除</button>'
    },
@endforeach
    ]
    ,height:'auto'
    ,cols: [[ //标题栏
      {checkbox: false, LAY_CHECKED: false} //默认全选
      ,{field: 'id', title: 'ID', width: 80, sort: true}
      ,{field: 'type', title: '版块名称', width: 120}
      ,{field: 'tstatus', title: '版块级别', width: 150}
      ,{field: 'sign', title: '操作', width: 150}
    ]]
    ,skin: 'row' //表格风格
    ,even: true
    ,page: true //是否显示分页
    ,limits: [20, 7, 10]
    ,limit:20 //每页默认显示的数量
  });
});
function tdel(id) {
	alter(id);
}
</script>
</div>
</body>
</html>