<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/template/admin/layui/css/layui.css">
	<link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/template/admin/layui/layui.js"></script>
	<style type="text/css">
		ul li{
			float: left;
			border:1px solid #ccc;
			width:26px;
			margin-left: 10px;
			font-size: 20px;
			text-align: center;
			margin-top: 10px;
		}
	</style>
</head>
<!-- <script type="text/javascript">alert($);</script> -->
<body style="padding: 10px;background: #fff;">
	<div class="user">
		<fieldset class="layui-elem-field layui-field-title">
			<legend>新闻列表</legend>
		</fieldset>
		<blockquote class="layui-elem-quote">
			<form action="{{url('/admin/news')}}" method="get">
				<div class="layui-input-inline">
					<input type="text" name="search" lay-verify="required"   value="{{ $req['search'] or '' }}" autocomplete="off" class="layui-input">
				</div>
				<button class="layui-btn"><i class="layui-icon">&#xe615;</i>搜索</button>
			</form>
		</blockquote>
		<div class="layui-form">
			<table class="layui-table" lay-size="sm" style="margin: 0 0;">
				<colgroup>
					<col width="60">
					<col width="80">
					<col width="130">
					<col width="140">
					<col width="100">
					<col width="100">
					<col width="100">
					<col width="200">
					<col width="100">
				</colgroup>
				<thead>
					<tr >
						<th >ID</th>
						<th >标题</th>
						<th >内容</th>
						<th >新闻图片</th>
						<th >板块</th>
						<th >创建时间</th>
						<th >修改时间</th>
						<th >操作</th>
					</tr>
				</thead>
				<tbody>
					{{--dd($data)--}}
					@foreach ($data as $k => $v)
					<tr>
						<td> {{ $v['id']}}</td>
						<td> {{ $v['title']}}</td>
						<td> {{ $v['content']}}</td>
						<td>
							<img src="{{$v['img']}}" alt='新闻封面图片'>
							<!-- <img src="/ueditor/php/upload/image/20171105/1509896794.bmp" alt='第三张图'> -->
						</td>
						<td> {{ $v['type']}}</td>
						<td> {{ $v['created_at']}}</td>
						<td> {{ $v['updated_at']}}</td>
						<td>
							@if ($v['nstatus'] == 1)
							    <a class="layui-btn layui-btn-mini layui-btn-warm" onclick="nshow( {{$v['id']}} )"> 隐藏新闻</a>
							@else
							    <a class="layui-btn layui-btn-mini layui-btn-normal" onclick="nshow( {{$v['id']}} )"> 显示新闻</a>
							@endif
							<a class="layui-btn layui-btn-mini layui-btn-normal" href="/admin/news/{{$v['id']}}/edit/" ><i class="layui-icon">&#xe642;</i> 编辑</a><br>
							<button style="margin-top:10px" onclick="newsdel({{$v['id']}})" class="layui-btn layui-btn-mini layui-btn-danger" ><i class="layui-icon">&#xe640;</i> 删除</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
<!-- //laravel分页 -->
{!! $data->appends($req)->render() !!}
<script>
	layui.use(['form', 'layedit', 'laydate'], function(){
		var form = layui.form
		,layer = layui.layer
		,layedit = layui.layedit
		,laydate = layui.laydate;
	});
/**
 * ajax删除新闻
 */
function newsdel(id) {
    $.post("{{url('/admin/news')}}"+"/"+id,{'_method':'DELETE','_token':"{{csrf_token()}}" },function(m){
        if(m == 1){
            alert("删除成功！");
            location.href = location.href;
        }else{
            alert('删除失败！');
            location.href = location.href;
        }
    });
}
	/**
	 * 显示隐藏新闻的ajax
	 * @param  {[type]} id [description]
	 * @return {[type]}    [description]
	 */
	function nshow(id) {
        $.get("{{url('/admin/news/nshow')}}"+"/"+id,function (msg) {
        		if(msg==1){
        			alert('隐藏成功！');
        			location.href="/admin/news";
        		}else if(msg==2){
        			alert('显示成功！');
        			location.href="/admin/news";
        		}else{
        			alert('操作失败！请联系程序猿！');
        		}
        });
	}
</script>
	</div>
	<p>　</p>
</body>
</html>