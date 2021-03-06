<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	  <link rel="stylesheet" href="/template/admin/layui/css/layui.css">
  <link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<link rel="stylesheet" href="/template/admin/style/index.css">
	<script src="/template/admin/layui/layui.js"></script>
</head>
<body style="padding: 10px;background: #eee;">

<div class="index">
	<ul class="row">
		<li>
			<div class="layui-anim ico" data-anim="layui-anim-rotate" style="background: #1e9fff;"><i class="fa fa-user fa-lg"></i></div>
			<div class="cont">
				<h3>5471</h3>
				<p>用户总量</p>
			</div>
		</li>
		<li>
			<div class="ico" style="background: #ff6c60;"><i class="fa fa-user-plus fa-lg"></i></div>
			<div class="cont">
				<h3>5471</h3>
				<p>今日新增</p>
			</div>
		</li>
		<li>
			<div class="ico" style="background: #009688;"><i class="fa fa-newspaper-o fa-lg"></i></div>
			<div class="cont">
				<h3>5471</h3>
				<p>文章总数</p>
			</div>
		</li>
		<li>
			<div class="ico" style="background: #5fb878;"><i class="fa fa-file-text-o fa-lg"></i></div>
			<div class="cont">
				<h3>5471</h3>
				<p>今日新增</p>
			</div>
		</li>
		<li>
			<div class="ico" style="background: #ff5722;"><i class="fa fa-bar-chart fa-lg"></i></div>
			<div class="cont">
				<h3>5471</h3>
				<p>访问IP</p>
			</div>
		</li>
		<li style="margin-right:0px">
			<div class="ico" style="background:#f7b824;"><i class="fa fa-globe fa-lg"></i></div>
			<div class="cont">
				<h3>5471</h3>
				<p>浏览UP</p>
			</div>
		</li>

	</ul>
	<!-- 主题内容 -->
<blockquote class="layui-elem-quote">欢迎管理员admin,本次登陆时间:2017-11-01 20:14:32 上次登陆时间:2017-10-29 15:34:11 当前浏览器是：Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0</blockquote>
	<!-- 服务器内容 -->
	<div class="model">
	<p class="title"><i class="fa fa-server"></i> 服务器信息 </p>
	<hr class="layui-bg-gray">
		<div class="content">
		<table class="layui-table">
	  <colgroup>
	    <col width="150px">
	    <col>
	  </colgroup>
			<tbody>
			<tr>
				<td>服务器系统</td><td colspan="3">{{$Server['os']}}</td>
			</tr>
			<tr>
				<td width="20%">服务器支持语言</td><td colspan="3">{{$Server['Server_Language']}}</td>
			</tr>
            <tr>
                <td width="20%">PHP版本</td><td width="30%">{{$Server['phpv']}}</td>
                <td width="20%">解析器</td><td>{{$Server['HTTP_Server']}}</td>
            </tr>
			<tr>
				<td>服务器时间</td><td colspan="3">{{$Server['time']}}</td>
			</tr>
			<tr>
				<td>服务器地址</td><td colspan="3">{{$Server['Server_name']}}</td>
			</tr>
			<tr>
				<td>服务器IP</td><td colspan="3">{{$Server['Server_ip']}}</td>
			</tr>
			<tr>
				<td width="20%">POST最大限制</td><td width="30%">{{$Server['POST']}}</td>
				<td width="20%">服务器空间</td><td width="30%" style="font-size:12px;color: #393d49;">{{$Server['Server_cpkj']-$Server['Server_cpky']}}GB / {{$Server['Server_cpky']}}GB / {{$Server['Server_cpkj']}}GB
					<div class="layui-progress">
						<div class="layui-progress-bar layui-bg-blue" lay-percent="{{($Server['Server_cpkj']-$Server['Server_cpky'])/($Server['Server_cpkj'])*100}}%"></div>
					</div>
				</td>
			</tr>


			</tbody>
	</table>
	</div>

</div>

<!-- 今日详情 -->
	<div class="model rl">
	<p class="title"><i class="fa fa-users"></i> 会员信息</p>
	<hr class="layui-bg-gray">
		<div class="content">
		<table class="layui-table">
	  <colgroup>
	    <col width="150px">
	    <col>
	  </colgroup>
	  <tbody>
	    <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>PHP</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	    <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	  </tbody>
	</table>
	</div>

</div>
<!-- 今日帖子 -->
	<div class="model">
	<p class="title"><i class="fa fa-bar-chart-o"></i> 流量统计</p>
	<hr class="layui-bg-gray">
		<div class="content">
		<table class="layui-table">
	  <colgroup>
	    <col width="150px">
	    <col>
	  </colgroup>
	  <tbody>
	    <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>PHP</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	    <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	   <tr>
	      <td>服务器系统</td><td>Linux Cent OS 6.8 x86</td>
	    </tr>
	  </tbody>
	</table>
	</div>

</div>
<!-- 今日详情 -->
	<div class="model rl">
	<p class="title"><i class="fa fa-bookmark-o"></i> 更新日志</p>
	<hr class="layui-bg-gray">
		<div class="content">
	<ul class="layui-timeline">
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <h3 class="layui-timeline-title">8月18日</h3>
      <p>
        layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
        <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
        <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
      </p>
    </div>
  </li>
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <h3 class="layui-timeline-title">8月16日</h3>
      <p>杜甫的思想核心是儒家的仁政思想，他有<em>“致君尧舜上，再使风俗淳”</em>的宏伟抱负。个人最爱的名篇有：</p>
      <ul>
        <li>《登高》</li>
        <li>《茅屋为秋风所破歌》</li>
      </ul>
    </div>
  </li>
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <h3 class="layui-timeline-title">8月15日</h3>
      <p>
        中国人民抗日战争胜利72周年
        <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
        <br>铭记、感恩
        <br>所有为中华民族浴血奋战的英雄将士
        <br>永垂不朽
      </p>
    </div>
  </li>
  <li class="layui-timeline-item">
    <i class="layui-icon layui-timeline-axis"></i>
    <div class="layui-timeline-content layui-text">
      <div class="layui-timeline-title">过去</div>
    </div>
  </li>
</ul>
	</div>

</div>
</div>
<p>　</p>
<script>
    //注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>