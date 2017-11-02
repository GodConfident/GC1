<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
		<form action="/user" method="get">
			<div class="layui-input-inline">
				<input type="text" name="username" lay-verify="required"  placeholder="请输入用户名" value="" autocomplete="off" class="layui-input">
			</div>
			<button class="layui-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
			<button class="layui-btn layui-btn-danger" id='tjyh'>添加用户</button>
		</form>
	</blockquote>
	<div class="layui-form">
		<table class="layui-table" lay-size="sm" style="width: 1550px;margin: 0 0;text-align: center">
			<colgroup>
				<col width="80">
				<col width="150">
				<col width="130">
				<col width="60">
				<col width="150">
				<col width="110">
				<col width="80">
				<col width="80">
				<col width="170">
				<col width="170">
				<col>
				<col width="170">
			</colgroup>
			<thead>
			<tr>
				<th>ID</th>
				<th>用户名</th>
				<th>昵称</th>
				<th>年龄</th>
				<th>邮箱</th>
				<th>手机号</th>
				<th>状态</th>
				<th>类型</th>
				<th>注册时间</th>
				<th>上次登陆</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td>18</td>
					<td>username</td>
					<td>较长的用户名</td>
					<td>26</td>
					<td>usernamepass@qq.com</td>
					<td>15332426402</td>
					<td><span class="layui-badge-rim layui-bg-green">正常</span></td>
					<td><span class="layui-badge-rim layui-bg-blue">管理员</span></td>
					<td>2017-02-30 15:23</td>
					<td>2017-07-14 14:21</td>
					<td>
						<a class="layui-btn layui-btn-mini layui-btn-normal" href="/user/edit/" ><i class="fa fa-edit"></i> 修改用户</a>
						<a class="layui-btn layui-btn-mini layui-btn-danger" href="/user/del/"><i class="fa fa-trash"></i> 删除用户</a>
					</td>
			</tbody>
		</table>
	</div>

		<script>

            $('#tjyh').click(function(){
                layer.open({
                    type: 2,
                    title: '添加用户',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['700px', '500px'],
                    content: 'mobile/' //iframe的url
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
		</script>
</div>
<p>　</p>
</body>
</html>