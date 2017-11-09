<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/template/admin/layui/css/layui.css">
	<link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	<script src="/template/admin/layui/layui.js"></script>
</head>
<body style="padding: 10px;background: #fff;">
	<div class="user">
		<fieldset class="layui-elem-field layui-field-title">
			<legend>新闻管理</legend>
		</fieldset>
		<p style="font-size: 30px;color:red">{{$msg or ''}}</p>
		<div class="layui-form">
			<table class="layui-table" lay-size="sm" style="margin: 0 0;">
				<colgroup>
					<col width="60">
					<col width="280">
					<col width="130">
					<col width="160">
				</colgroup>
				<thead>
					<tr >
						<th >ID</th>
						<th >板块名</th>
						<th >状态</th>
						<th >操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $k =>$v)
					<tr>
						<td> {{ $v['type_id']}}</td>
						<td>
							{{ $v['type']}}
						</td>
						<td> {!! $v['tstatus']!!}</td>
						<td>
							<a class="layui-btn layui-btn-mini layui-btn-normal" href="/admin/newstype/{{$v['type_id']}}/edit/" ><i class="layui-icon">&#xe642;</i> 编辑</a>
							{!! $v['bdel'] !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<p>　</p>

	<script type="text/javascript">
		layui.use('layer', function(){
			layer = layui.layer;
		});

/**
 * 删除板块
 * @param  typeid
 * @return bool
 */
 function tdel(typeid){
 	layer.confirm('确认删除板块吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
            	$.post("{{url('/admin/newstype')}}"+'/'+typeid,{"_token":"{{csrf_token()}}","_method":"DELETE"},function (data) {
            		if( data.status == 1){
            			layer.msg(data.msg, {icon: 6});
            			location.href = "{{url('/admin/newstype')}}";
            		}else{
	                           // location.href = location.href;
	                           layer.msg(data.msg, {icon: 5});
	                       }
	                   });
            }, function(){
            	layer.msg('取消删除', {icon: 6});
            });
 }
/**
 * 板块显示隐藏ajax
 */
 function bshow(id) {
 	$.get("{{ url('/admin/newstype/bshow') }}"+'/'+id,function (msg) {
 		if(msg==1){
 			alert('本板块下的子板块及新闻都会显示');
 			location.href = "{{url('admin/newstype')}}";
 		}else if(msg==2){
 			alert('本板块下的子板块及新闻都会隐藏');
 			location.href = "{{url('admin/newstype')}}";
 		}else{
 			alert('程序错误！请在试一试，或者联系程序猿！');
 		}
 	});
 }
/**
 * 添加子版块
 */
// function addtype(id,bpath) {
// 	// alert(id);
// //prompt层
// var bpath=bpath;
// layer.prompt({title: '请输入子模块名', formType: 0}, function(pass, index,value){
//   // layer.close(index);

// 	$.post('/admin/newstype/addtype',{"_token":"{{csrf_token()}}","bpath":bpath,"id":id,},function (data) {
// 		alert(data);
// 	        		// if( data.status == 1){
// 	          //                  location.href = location.href;
//            //              	     layer.msg(data.msg, {icon: 6});
// 	          //              }else{
// 	          //                  // location.href = location.href;
// 	          //                  layer.msg(data.msg, {icon: 5});
// 	          //              }
//             	});
// });
// }
</script>
</body>
</html>