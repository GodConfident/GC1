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
<div class="user">
	<fieldset class="layui-elem-field layui-field-title">
		<legend>新闻管理</legend>
	</fieldset>
	<blockquote class="layui-elem-quote">
			<button class="layui-btn layui-btn-danger" id='tjyh'>添加板块</button>
	</blockquote>
	<div class="layui-form">
		<table class="layui-table" lay-size="sm" style="margin: 0 0;">
			<colgroup>
				<col width="60">
				<col width="280">
				<col width="130">
				<col width="160">
			</colgroup>
			<thead>
			<tr >
				<th >ID</th>
				<th >板块名</th>
				<th >状态</th>
				<th >操作</th>
			</tr>
			</thead>
<tbody>
	 @foreach ($data as $k )
	<tr>
		<td> {{ $k->id}}</td>
		<td> {{ $k->type}}</td>
		<td> {{ $k->tstatus}}</td>
		<td>
			<a class="layui-btn layui-btn-mini " href="/admin/newstype/{{$k->id}}/" ><i class="layui-icon">&#xe642;</i> 添加子级</a>
			<a class="layui-btn layui-btn-mini layui-btn-normal" href="/admin/newstype/{{$k->id}}/edit/" ><i class="layui-icon">&#xe642;</i> 编辑</a>
			<button class="layui-btn layui-btn-mini layui-btn-danger" onclick="tdel({{ $k->id}})" ><i class="layui-icon">&#xe640;</i> 删除</button>

		</td>
	</tr>
	@endforeach
</tbody>
		</table>
	</div>
</div>
<p>　</p>
<script type="text/javascript">
layui.use('layer', function(){
  	layer = layui.layer;
});

/**
 * 删除板块
 * @param  typeid
 * @return bool
 */
        function tdel(typeid){
           	layer.confirm('确认删除板块吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
            	$.post('/admin/newstype'+'/'+typeid,{"_token":"{{csrf_token()}}","_method":"DELETE"},function (data) {
	        		if( data.status == 1){
	                           location.href = location.href;
                        	     layer.msg(data.msg, {icon: 6});
	                       }else{
	                           // location.href = location.href;
	                           layer.msg(data.msg, {icon: 5});
	                       }
            	});
            }, function(){
		layer.msg('取消删除', {icon: 6});
            });
        }
/**
 * 添加子级板块
 */
</script>
</body>
</html>