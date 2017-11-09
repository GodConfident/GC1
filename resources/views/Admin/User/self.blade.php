<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>用户信息</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.min.css">
		<link href="/css/self.css" rel="stylesheet" type="text/css">

		<link href="/css/self2.css" rel="stylesheet" type="text/css">
		<link href="/css/self3.css" rel="stylesheet" type="text/css">
		<link href="/css/self4.css" rel="stylesheet" type="text/css">
		<style type="text/css">

		</style>
	</head>

	<body>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人中心</strong> / <small>修改信息</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div style="float: left;width: 100px; margin-top:0;" class="m-progress">
						<img style="width: inherit;" src='/imgs/default.jpg' />
					</div>
					<form style="float: left;" class="am-form am-form-horizontal" enctype="multipart/form-data" method="post" action="/admin/activation">
					{{ csrf_field() }}
						<div class="am-form-group">
							<label for="nickname" class="am-form-label">昵称</label>
							<div class="am-form-content">
								<input type="text" name="nickname" id="nickname" value="">
							</div>
						</div>
						
						<div class="am-form-group">
							<label for="email" class="am-form-label">邮箱</label>
							<div class="am-form-content">
								<input type="email" name="email" id="email" value="">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">密码</label>
							<div class="am-form-content">
								<input type="password" name="password" id="user-new-password" value="">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" name='repassword' id="user-confirm-password" value="">
							</div>
						</div>
						<div class="am-form-group">
							<label for="age" class="am-form-label">年龄</label>
							<div class="am-form-content">
								<input type="text" name='age' id="age" value="">
							</div>
						</div>
						<div class="am-form-group">
							<label for="male" class="am-form-label">男<input type="radio" name='sex' id="male" value="1"></label>
							<label for="female" class="am-form-label">女<input type="radio" name='sex' id="female" value="0"></label>
								

						</div>
						<div class="am-form-group">
							<label for="file" class="am-form-label">头像</label>
							<div class="am-form-content">
								<input type="file" name='img' id="file" placeholder="">
							</div>
						</div>
						<div class="am-form-group">
							
						</div>
					@if (!empty($password))
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">原密码</label>
							<div class="am-form-content">
								<input type="password" name='password' id="user-old-password" placeholder="输入原密码才能修改信息">
							</div>
						</div>
					@endif

						<div class="info-btn">
							<button class="am-btn am-btn-danger">保存修改</button>
						</div>
						

					</form>

				</div>
				
			</div>
		
		</div>

	</body>

</html>