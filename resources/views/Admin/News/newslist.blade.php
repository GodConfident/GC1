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
<div class="user">
	<fieldset class="layui-elem-field layui-field-title">
		<legend>新闻管理</legend>
	</fieldset>
	<blockquote class="layui-elem-quote">
		<form action="/user" method="get">
			<div class="layui-input-inline">
				<input type="text" name="username" lay-verify="required"  placeholder="请输入关键词" value="" autocomplete="off" class="layui-input">
			</div>
			<button class="layui-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
			<button class="layui-btn layui-btn-danger" id='tjyh'>添加新闻</button>
		</form>
	</blockquote>
	<div class="layui-form">
		<table class="layui-table" lay-size="sm" style="margin: 0 0;">
			<colgroup>
				<col width="60">
				<col width="80">
				<col width="130">
				<col width="160">
				<col width="60">
				<col width="100">
				<col width="100">
				<col width="200">
				<col width="100">
			</colgroup>
			<thead>
			<tr >
				<th >ID</th>
				<th >标题</th>
				<th >内容</th>
				<th >图片</th>
				<th >板块</th>
				<th >创建时间</th>
				<th >修改时间</th>
				<th >操作</th>
				<th >删除时间</th>
			</tr>
			</thead>
			<tbody>
					{{--dd($data)--}}
					@foreach ($data as $k => $v)
					<tr>
					    <td> {{ $v['id']}}</td>
					    <td> {{ $v['title']}}</td>
					    <td> {{ $v['content']}}</td>
					    <td> {{ $v['img']}}</td>
					    <td> {{ $v['tid']}}</td>
					    <td> {{ $v['created_at']}}</td>
					    <td> {{ $v['updated_at']}}</td>
					<td>
						<a class="layui-btn layui-btn-mini layui-btn-normal" href="/admin/edit/" ><i class="layui-icon">&#xe642;</i> 编辑</a>
						<a class="layui-btn layui-btn-mini layui-btn-danger" href="/admin/del/"><i class="layui-icon">&#xe640;</i> 回收</a>
					</td>
					    <td> {{ $v['deleted_at']}}</td>
					</tr>
					@endforeach
			</tbody>
		</table>
	</div>

<script>

            $('#tjyh').click(function(){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.open({
                        type: 1,
                        offset: '200px',
                        area: ['600px', '500'],
                        title:'添加新闻',
                        move: false,
                        content: '<div style="padding: 20px;"><form action="/user/add"method="post"class="layui-form layui-form-pane"><div class="layui-form-item"><label class="layui-form-label">用户名</label><div class="layui-input-block">{{csrf_field()}}<input type="text"name="username"autocomplete="off"placeholder="请输入用户名"class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">电子邮件</label><div class="layui-input-block"><input type="email"name="email"autocomplete="off"class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">手机号码</label><div class="layui-input-block"><input type="phone"name="phone"autocomplete="off"class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">年龄</label><div class="layui-input-block"><input type="text"name="age"lautocomplete="off"class="layui-input"></div></div><div class="layui-form-item"><div class="layui-input-block"><button class="layui-btn"lay-submit=""lay-filter="formDemo">立即提交</button><button type="reset"class="layui-btn layui-btn-primary">重置</button></div></div></form></div>'
                    });
                })
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
		</script>
</div>
<p>　</p>
</body>
</html>