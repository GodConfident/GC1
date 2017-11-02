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

<form class="layui-form" action="">

  <div class="layui-form-item">
    <label class="layui-form-label">板块名</label>
    <div class="layui-input-block">
      <input name="title" lay-verify="title" autocomplete="off" placeholder="请输入新板块名" class="layui-input" type="text">
    </div>
  </div>

    <div class="layui-form-item">
    <label class="layui-form-label">单行选择框</label>
    <div class="layui-input-block">
      <select name="interest" lay-filter="aihao">
        <option value=""></option>
        <option value="0">写作</option>
        <option value="1" selected="">阅读</option>
        <option value="2">游戏</option>
        <option value="3">音乐</option>
        <option value="4">旅行</option>
      </select>
    </div>
  </div>

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