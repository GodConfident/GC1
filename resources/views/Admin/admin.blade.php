<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Laoit</title>
  <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">唠IT</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="/admin"><i class="fa fa-dashboard"></i> 后台首页</a></li>
      <li class="layui-nav-item"><a href=""><i class="fa fa-home"></i> 网站首页</a></li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退了</a></li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        {{--用户管理--}}
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">新闻管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/user" target="content">用户列表</a></dd>
            <dd><a href="/admin/del" target="content">回收站</a></dd>
          </dl>
        </li>
        {{--新闻列表--}}
<!--         <li class="layui-nav-item">
          <a class="" href="/admin/newstype"  target="content">新闻模块</a>
          <dl class="layui-nav-child">
            <dd><a  href="/admin/newstype"  target="content">新闻版块</a></dd>
            <dd><a href="/admin/news" target="content">新闻列表</a></dd>
            <dd><a href="javascript:;">添加新闻</a></dd>
            <dd><a href="/admin/newstype " target="content">新闻版块</a></dd>
            <dd><a href="javascript:;">回收站</a></dd>
          </dl>
        </li> -->

        <li class="layui-nav-item">
          <a class="" href="javascript:;">用户管理</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/user" target="content">用户列表</a></dd>
            <dd><a href="/admin/user/del" target="content">回收站</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a class="" href="/admin/conf"  target="content"><i class="fa fa-cog"></i> 系统设置</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/conf" target="content">站点设置</a></dd>
            <dd><a href="/admin/conf/websetadd" target="content">添加网站设置</a></dd>
            <dd><a href="/admin/index/sensitive" target="content">敏感词设置</a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>
  <div class="layui-body" style="">
    <!-- 内容主体区域 -->
    <!-- section('content') -->
    <!-- show -->
    <div style="width: 100%;height: 100%;overflow:hidden;">
      <iframe src="/admin/index" name="content" frameborder="0" width="100%" height="100%"  style="margin: 0"></iframe>
    </div>
    <div class="layui-footer jqadmin-foot" style="left: 160px;text-align: center;">
      <div class="layui-mian">
        <p class="jqadmin-copyright">
          <span class="layui">2017 ©</span> Write by Paco,<a href="http://www.jqcool.net">laoIT</a>. 版权所有 <span class="layui">依赖前端框架layui</span>
        </p>
      </div>
    </div>
  </div>

  <div class="layui-footer">
    <!-- 底部固定区域 -->
  </div>
</div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="/template/admin/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
      var element = layui.element;
      
    });

    $('.layui-nav-item a').click(function(){
      $this=$(this)
      $(this).parent().siblings().removeClass('layui-nav-itemed')

    })
</script>
</body>
</html>