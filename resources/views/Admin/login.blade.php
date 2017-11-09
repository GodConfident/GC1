<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
    <style>
        body{background: #eee;}
        .login{width: 350px;height: 340px;background: #fff;border: 1px solid #CCC;margin: 0 auto;margin-top: 5vh;box-shadow: 3px 3px 30px #666;border-radius: 10px}
        .title{text-align: center;font-size: 36px;color: #393d49;font-weight: bold;margin-top: 10vh}
        .title_dl{text-align: center;margin-top: 10px;font-size: 18px;}
        .layui-form-item{margin-bottom: 25px}
    </style>
</head>
<body>
<p class="title">唠IT后台管理系统</p>
<div class="login">
    <p class="title_dl">登　陆</p>
    <hr class="layui-bg-gray">
    <form action="{{ url('/admin/login/dologin') }}" method="post" class="layui-form layui-form-pane" style="padding-left:25px;padding-top:25px;width: 100%;">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 80px;">用户名</label>
            <div class="layui-input-inline">
                <input type="text" value="{{ old('username') }}" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 80px;">密　码:</label>
            <div class="layui-input-inline">
                <input type="text" name="password" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 80px;float: left;">验证码:</label>
            <div class="layui-input-inline" style="width: 100px;float: left;margin-right: 5px;">
                <input type="text" width="80px" name="check" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
            <img src="{{ asset('/code') }}" onclick="this.src='{{ asset('/code') }}?'+Math.random();" style="height: 35px;border: 1px solid #ccc;width: 85px;float: left;">
            <i style="line-height: 35px;"></i>
        </div>

        <button type="submit" class="layui-btn" style="width: 280px;margin-left: 10px;">登　陆</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/template/admin/layui/layui.js"></script>
<script type="text/javascript">
    layui.use('layer', function(){
     var layer = layui.layer;
          @if (count($errors) > 0)
                @if ( is_object($errors) !='object')
                    // layer.msg("{{$errors}}", {offset:'150px'});
                @else
                var error='';
                    @foreach ($errors->all() as $error)
                     error+='{{ $error }}<br>';
                    @endforeach
                   layer.msg(error, {offset:'150px'});
                   return false;
                @endif
        @endif

    });
    $('input[name=username]').blur(function(){
        $this=$(this)
        if(!$(this).val().match(/\w{6,18}/)){
            layer.msg('用户名格式不正确', {icon: 5,offset:'150px'});
        }
    })
    $('input[name=password]').blur(function(){
        $this=$(this)
        if(!$(this).val().match(/\w{6,18}/)){
            layer.msg('密码格式不正确', {icon: 5,offset:'150px'});
        }
    })



    $('input[name=check]').keyup(function(){
        var value=$(this).val()
        $this=$(this)
        if(value.length>=4){
            $.post("{{ url('/admin/login/check') }}",{'code':value,'_token':"{{csrf_token()}}" },function(m){
                if(m==1){
                    $this.parent().siblings('i').removeClass().addClass('fa fa-check').css('color', '#5fb878')
                }else{
                    // $this.parent().siblings('i.layui-icon').html('&#x1006;').css('color','#f33')
                    $this.parent().siblings('i').removeClass().addClass('fa fa-close').css('color', '#ff6c60')
                }
            })
        }
    })
</script>
</body>
</html>