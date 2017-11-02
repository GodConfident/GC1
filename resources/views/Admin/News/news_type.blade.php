<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/template/admin/layui/css/layui.css">
	<link rel="stylesheet" href="/template/admin/fonts/css/font-awesome.min.css">
	<!-- <script src="/js/jquery-3.2.1.min.js"></script> -->
	<!-- <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script> -->
	<script src="/template/admin/layui/layui.js"></script>
</head>
<body style="padding: 10px;background: #fff;">
<div class="user">
	<fieldset class="layui-elem-field layui-field-title">
		<legend>新闻管理</legend>
	</fieldset>
	<blockquote class="layui-elem-quote">
			<button class="layui-btn layui-btn-danger" id='tjyh' onclick="tdel(10);">添加板块</button>
	</blockquote>
	<div class="layui-form">
		<table class="layui-table" lay-size="sm" style="margin: 0 0;">
<!-- 			<colgroup>
				<col width="60">
				<col width="280">
				<col width="130">
				<col width="160">
			</colgroup> -->
			<thead>
			<tr >
				<th >ID</th>
				<th >板块名</th>
				<th >板块级别</th>
				<th >状态</th>
			</tr>
			</thead>
<tbody>
	 @foreach ($data as $k )
	<tr>
		
		
	</tr>
	@endforeach
</tbody>
		</table>
	</div>

</div>
<p>　</p>
<script type="text/javascript">


	// 弹出层 弹框 end
        function tdel(typeid){
	// 弹出层 弹框
layui.use('layer', function(){
  	 layer = layui.layer;

  	
});

 layer.msg('hello');
       

// layui.use('layer', function(){
//   var layer = layui.layer;
  
//    	//大坑！！！！！！！！！！！！！！！！必须要全局的id
//         		//id = typeid;
//         	// alter(typeid);exit;
//            	layer.confirm('确认删除板块吗？', {
//                 btn: ['确定','取消'] //按钮
//             }, function(){

//                                     $.ajax({
//                                         type: "POST",
//                                         url: "/admin/newstype"+"/"+typeid,
//                                         data:{"_token":"{{csrf_token()}}","_method":"DELETE","id":typeid},
//                                         async:false,
//                                         dataType:"json",
//                                         success:function (data){
//                                         	// alert(data);
// 			                       if( data.status == 0){
// 			//                            将json格式的字符串变成json对象
// 			                          var data = JSON.parse(data);
// 			                           layer.msg(data.msg, {icon: 6});
// 			                           // location.href = location.href;
// 			                       }else{
// 			                           layer.msg(data.msg, {icon: 5});
// 			                           // location.href = location.href;
// 			                       }
// 			                }
//                                     });
//             }, function(){
// 		layer.msg('取消删除', {icon: 6});
//             });
//});  




       
        }
                //向服务器发送删除请求
               // $.ajax(请求的路径，携带的参数，返回的结果)
               // url===>admin/newstype/21
//                 $.post("{{url('/admin/newstype/')}}/"+id,{'_token':'{{csrf_token()}}','_method':'DELETE'},function(data){
//                        if( data.status == 0){
// //                            将json格式的字符串变成json对象
//                           var data = JSON.parse(data);
//                            layer.msg(data.msg, {icon: 6});
//                            location.href = location.href;
//                        }else{
//                            layer.msg(data.msg, {icon: 5});
//                            location.href = location.href;
//                        }
//                 });
</script>
</body>
</html>