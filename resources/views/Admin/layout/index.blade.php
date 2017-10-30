<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
  <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">唠IT</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">后台首页</a></li>
      <li class="layui-nav-item"><a href="">网站首页</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
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
        <li class="layui-nav-item layui-this"><a href=""><i class="fa fa-home fa-lg"></i> 后台首页</a></li>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">新闻模块</a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/news" target="content">新闻列表</a></dd>
            <dd><a href="javascript:;">添加新闻</a></dd>
            <dd><a href="javascript:;">新闻版块</a></dd>
            <dd><a href="javascript:;">回收站</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="http://www.baidu.com" target="content">云市场</a></li>

      </ul>
    </div>
  </div>
  
  <div class="layui-body" style="padding: 15px 10px 0px 10px;background: #eee;">
    <!-- 内容主体区域 -->
    <!-- section('content') -->
    <!-- show -->
    <iframe src="/admin/content" name="content" frameborder="0" width="100%" height="100%" style="margin: 0"></iframe>
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
  <script src="/template/admin/layui/layui.js"></script>
    @section('footer')
    @show
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>