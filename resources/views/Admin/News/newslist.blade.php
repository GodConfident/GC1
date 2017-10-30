<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css?t=1509347459062" media="all">
  <style>
    body{margin: 10px;}
    .demo-carousel{height: 200px; line-height: 200px; text-align: center;}
  </style>
</head>
<body>

<table class="layui-table" lay-data="{height:332, url:'/demo/table/user/', page:true, id:'idTest'}" lay-filter="demo">
  <thead>
    <tr>
      <!-- <th lay-data="{field:'id', width:80, sort: true 上下三角, fixed: true}">ID</th> -->
      <th lay-data="{field:'id', width:80, fixed: true}">ID</th>
      <th lay-data="{field:'title', width:80}">标题</th>
      <th lay-data="{field:'content', width:80}">内容</th>
      <th lay-data="{field:'img', width:280}">图片</th>
      <th lay-data="{field:'tid', width:120}">所属板块</th>
      <th lay-data="{field:'nstatus', width:60}">状态</th>
      <th lay-data="{field:'created_at', width:80}">创建时间</th>
      <th lay-data="{field:'updated_at', width:80}">修改时间</th>
      <th lay-data="{field:'deleted_at', width:80}">删除时间</th>
      <th lay-data="{field:'', width:80}">操作</th>
    </tr>
  </thead>
</table>

<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-primary layui-btn-mini" lay-event="detail">查看</a>
  <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
</script>

<div class="layui-tab layui-tab-brief" lay-filter="demo">
  <ul class="layui-tab-title">
    <li class="layui-this">演示说明</li>
    <li>日期</li>
    <li>分页</li>
    <li>上传</li>
  </ul>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show">

      <div class="layui-carousel" id="test1">
        <div carousel-item>
          <div><p class="layui-bg-green demo-carousel">在这里，你将以最直观的形式体验 layui！</p></div>
          <div><p class="layui-bg-red demo-carousel">在编辑器中可以执行 layui 相关的一切代码</p></div>
          <div><p class="layui-bg-blue demo-carousel">你也可以点击左侧导航针对性地试验我们提供的示例</p></div>
          <div><p class="layui-bg-orange demo-carousel">如果最左侧的导航的高度超出了你的屏幕</p></div>
          <div><p class="layui-bg-cyan demo-carousel">你可以将鼠标移入导航区域，然后滑动鼠标滚轮即可</p></div>
        </div>
      </div>
    </div>
    <div class="layui-tab-item">
      <div id="laydateDemo"></div>
    </div>
    <div class="layui-tab-item">
      <div id="pageDemo"></div>
    </div>
    <div class="layui-tab-item">
      <div class="layui-upload-drag" id="uploadDemo">
        <i class="layui-icon"></i>
        <p>点击上传，或将文件拖拽到此处</p>
      </div>
    </div>
  </div>
</div>

<script src="//res.layui.com/layui/dist/layui.js?t=1509347459062"></script>
<script>
layui.use(['laydate', 'laypage', 'layer', 'table', 'carousel', 'upload', 'element'], function(){
  var laydate = layui.laydate //日期
  ,laypage = layui.laypage //分页
  layer = layui.layer //弹层
  ,table = layui.table //表格
  ,carousel = layui.carousel //轮播
  ,upload = layui.upload //上传
  ,element = layui.element; //元素操作

  //向世界问个好
  layer.msg('Hello World');

  //监听Tab切换
  element.on('tab(demo)', function(data){
    layer.msg('切换了：'+ this.innerHTML);
    console.log(data);
  });

  //监听工具条
  table.on('tool(demo)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
    var data = obj.data //获得当前行数据
    ,layEvent = obj.event; //获得 lay-event 对应的值
    if(layEvent === 'detail'){
      layer.msg('查看操作');
    } else if(layEvent === 'del'){
      layer.confirm('真的删除行么', function(index){
        obj.del(); //删除对应行（tr）的DOM结构
        layer.close(index);
        //向服务端发送删除指令
      });
    } else if(layEvent === 'edit'){
      layer.msg('编辑操作');
    }
  });



  //分页
  laypage.render({
    elem: 'pageDemo' //分页容器的id
    ,count: 100 //总页数
    ,skin: '#1E9FFF' //自定义选中色值
    //,skip: true //开启跳页
    ,jump: function(obj, first){
      if(!first){
        layer.msg('第'+ obj.curr +'页');
      }
    }
  });


});
</script>
</body>
</html>
