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
<form action="{{ url('admin/user/') }}" method="post" class="layui-form" style="width: 80%">
    {{ csrf_field() }}
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
            <input type="text" id="username" name="username" required  lay-verify="required" placeholder="请输入标题" autocomplete="on" style="width: 80%;display: inline-block;" class="layui-input">
            <i style="font-size: 12px;"></i>
        </div>
    </div>
    {{-- <div class="layui-form-item">
        <label class="layui-form-label">电子邮箱</label>
        <div class="layui-input-block">
            <input type="email" name="email" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" style="width: 80%;display: inline-block;" class="layui-input">
        </div>
    </div> --}}
    <div class="layui-form-item">
        <label class="layui-form-label">手机号</label>
        <div class="layui-input-block">
            <input type="text" name="phone"  style="width: 80%;display: inline-block;" placeholder="请输入手机号" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">性别</label>
        <div class="layui-input-block">
            <input type="radio" name="sex" value="1" title="男">
            <input type="radio" name="sex" value="0" title="女" checked>

        </div>
    </div>

    {{--提交--}}
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<p>　</p>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/template/admin/layui/layui.js"></script>
<script>
    layui.use('layer', function(){
        var layer = layui.layer;

            // 添加成功，弹出提示
            @if (count($errors)>0)
                layer.msg('{{ $errors }}');
            @endif

            $('#username').blur(function(){
            var val=$(this).val()
            var $this=$(this)

            if(val.length<6 || !val.match(/^\w{6,18}$/) ){
                layer.msg('用户名格式不正确')
            }else{
                $.ajax({
                    type:'post',
                    data:{ "_token":"{{ csrf_token() }}" , "username": val } ,
                    url:"{{ url('admin/user/adduser') }}" ,
                    success:function(m){
                       if(m==1){
                           $this.siblings('i').text('已注册').css('color','#f66')
                       }else{
                           // $this.parent().siblings('i.layui-icon').html('&#x1006;').css('color','#f33')
                           $this.siblings('i').text('用户名可用').css('color','green')
                       }
                    }
                })
            }
        })
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
            username: function(value){
                if(value.length < 5){
                    return '请输入6-18位用户名';
                }
            }
            ,email: [/^\w{3,}@\w{2,}\.(com|cn)$/, '密码必须6到12位']

            ,content: function(value){
                layedit.sync(editIndex);
            }
        });

        

        // //监听提交
        // form.on('submit(demo1)', function(data){
        //     layer.alert(JSON.stringify(data.field), {
        //         title: '最终的提交信息'
        //     })
        //     return false;
        // });



    });
</script>
</body>
</html>