<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">

    <script src="/template/admin/layui/layui.js"></script>
</head>
<body style="padding: 10px;">
<fieldset class="layui-elem-field layui-field-title">
    <legend>敏感词设置</legend>
</fieldset>
<form action="" class="layui-form" style="width: 80%">
    <div class="layui-form-item">
        <label class="layui-form-label">开启敏感词</label>
        <div class="layui-input-block">
            <input checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" type="checkbox">
        </div>
    </div>

    <div class="layui-form-item layui-form-text">
        {{--<label class="layui-form-label">敏感词</label>--}}
        <div class="layui-input-block">
            <blockquote class="layui-elem-quote">多个·敏感词使用","英文逗号分隔!</blockquote>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">敏感词</label>
        <div class="layui-input-block">
            <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
    </div>

    {{--提交--}}
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>


<p>　</p>

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
</body>
</html>