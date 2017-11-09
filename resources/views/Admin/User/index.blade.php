<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/template/admin/layui/css/layui.css">
	<link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<script src="/template/admin/layui/layui.js"></script>
	<script src="/template/admin/jquery-1.8.3.min.js"></script>
</head>
<body style="padding: 10px;">
<div class="user">
	<fieldset class="layui-elem-field layui-field-title">
		<legend>用户管理</legend>
	</fieldset>
	<blockquote class="layui-elem-quote">
		<form action="/admin/user" class="layui-form" method="get">
			{{--选择框--}}
			<div class="layui-input-block" style="float:left;margin: 0px;width:150px;margin-right: 5px">
				<select name="key" lay-verify="required">
					<option value="0" {{ $key==0?'selected':'' }}>不限</option>
					<option value="1" {{ $key==1?'selected':'' }}>用户名</option>
					<option value="2" {{ $key==2?'selected':'' }}>昵称</option>
					<option value="3" {{ $key==3?'selected':'' }}>邮箱</option>
					<option value="4" {{ $key==4?'selected':'' }}>手机号</option>
				</select>
			</div>
			{{--选择框结束--}}
			<div class="layui-input-inline">
				<input type="text" name="keywords" lay-verify="required"  placeholder="请输入用户名" value="{{ $keywords }}" autocomplete="off" class="layui-input">

			</div>
			<button class="layui-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
			<button class="layui-btn layui-btn-danger" id='tjyh'>添加用户</button>
		</form>
	</blockquote>
	<div class="layui-form">
		<table class="layui-table" lay-size="sm" style="width: 1050px;margin: 0 0;text-align: center">
			<colgroup>
				<col width="30">
				<col width="120">
				<col width="100">
				<col width="60">
				<col width="150">
				<col width="80">
				<col width="80">
				<col width="100">
				<col width="130">
			</colgroup>
			<thead>
			<tr>
				<th>编号</th>
				<th>用户名</th>
				<th>昵称</th>
				<th>年龄</th>
				<th>邮箱</th>
				<th>手机号</th>
				<th>状态</th>
				<th>上次登陆</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
				@foreach ($users as $v)
				<tr>
					<td>{{ ($page-1)*10 + $index++ }}</td>
					<td>{{ $v['username'] }}</td>
					<td>{{ $v['nickname'] }}</td>
					<td>{{ $v['age'] }}</td>
					<td>{{ $v['email'] }}</td>
					<td>{{ $v['phone'] }}</td>
					<td><span class="layui-badge-rim layui-bg-green">{{ $status[$v['status']] }}</span></td>
					<td>{{date('Y-m-d H:i:s',$v['last_login'])}}</td>
					<td>

						<a class="layui-btn layui-btn-mini layui-btn-danger" href="javascript:;" onclick="del(this,{{ $v['id'] }});"><i class="fa fa-trash"></i> 删除</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		<style type="text/css">
			li{
				float: left;
				width: 25px;
				height: 22px;
				background: #fcc;
				margin: 2px;
			}
			.active{
				background: #ccc;
			}
		</style>
		{!! $users->appends(['page'=>$page,'key'=>$key,'keywords'=>$keywords])->render() !!}

		<script>

            $('#tjyh').click(function(){
                layer.open({
                    type: 2,
                    title: '添加用户',
                    shadeClose: true,
                    shade: 0.8,
					anim:2,
                    move: true,
                    skin: 'layui-layer-molv',
                    area: ['700px', '500px'],
                    content: '/admin/user/create' //iframe的url
                });
                return false;
            })

            layui.use(['form', 'layedit', 'laydate'], function(){
                var form = layui.form
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;

                //日期
                laydate.render({
                    elem: '#date'
                });
                laydate.render({
                    elem: '#date1'
                });

                //创建一个编辑器
                var editIndex = layedit.build('LAY_demo_editor');

                //自定义验证规则
                form.verify({
                    title: function(value){
                        if(value.length < 5){
                            return '标题至少得5个字符啊';
                        }
                    }
                    ,pass: [/(.+){6,12}$/, '密码必须6到12位']
                    ,content: function(value){
                        layedit.sync(editIndex);
                    }
                });

                //监听指定开关
                form.on('switch(switchTest)', function(data){
                    layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                        offset: '6px'
                    });
                    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
                });

                //监听提交
                form.on('submit(demo1)', function(data){
                    layer.alert(JSON.stringify(data.field), {
                        title: '最终的提交信息'
                    })
                    return false;
                });


            });

            //用户删除
            function del(obj,id){
				layui.use('layer', function(){
					var layer = layui.layer;
	            	layer.confirm('确认删除吗？',{},function(){
	            		$.ajax({
		            		url:"{{ url('/admin/user/') }}/"+id,
		            		type:"post",
		            		data:{"_method":"delete","_token":"{{ csrf_token() }}"},
		            		success:function(m){
	    						if(m==1){
	    							layer.msg('删除成功')
	    							$(obj).parents('tr').first().remove()
	    						}else{
	    							layer.msg('删除失败')
	    						}
		    					
	            			}
	            		})
	            	},function(){})
            	})
            }
		</script>
</div>
<p>　</p>
</body>
</html>