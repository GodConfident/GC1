<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
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

    <form action="" class="layui-form layui-form-pane" style="padding-left:25px;padding-top:25px;width: 100%;">
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 80px;">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 80px;">密　码:</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 80px;float: left;">验证码:</label>
            <div class="layui-input-inline" style="width: 130px;float: left;margin-right: 5px;">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
            <img src="" alt="" style="height: 35px;border: 1px solid #ccc;width: 85px;float: left;">
        </div>
        <button class="layui-btn" style="width: 280px;margin-left: 10px;">登　陆</button>
    </form>
</div>
<script src="/template/admin/layui/layui.js"></script>
</body>
</html>