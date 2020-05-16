<?php
header("content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>非授课工作量管理系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link rel='stylesheet' type='text/css' />

</head>
<body>
	<div class="container">
		<div class="row text-center  ">
			<div class="col-md-12">
				<br /> <br />
				<h2>非授课工作量管理系统</h2>
				<br />
			</div>
		</div>
		<div class="row">

			<div
				class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> 用户注册 </strong>
					</div>
					<div class="panel-body">
						<form role="form" action='registerationdo.php'
							method="post" name="information">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 教工号</i></span>
								<input type="text" class="form-control" placeholder="用户名 "
									name='username' id="username" maxlength="32" required="required"/>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-level-up">
										&nbsp;角色名</i></span> <select class="form-control" name="role"
									width=30>
									<option value='教师' selected>教师</option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;姓&nbsp;&nbsp;&nbsp;&nbsp;名</i></span>
								<input type="text" class="form-control" placeholder="姓名"
									id="myname" maxlength="32" name='name' required="required"/>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-level-up">
										&nbsp;部门名</i></span> <select class="form-control"
									name="departmentName" id="departmentName" width=30>
									<option value='办公室' selected>办公室</option>
									<option value='实训中心'>实训中心</option>
									<option value='室内设计专业群'>室内设计专业群</option>
									<option value='工业设计专业群'>工业设计专业群</option>
									<option value='广告设计专业群'>广告设计专业群</option>
									<option value='电子商务专业群'>电子商务专业群</option>
									<option value='网络专业群'>网络专业群</option>
									<option value='软件专业群'>软件专业群</option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon">@邮&nbsp;&nbsp;&nbsp;箱</span> <input
									type="text" class="form-control" required="required"
									placeholder="电子邮件" name="email" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock">&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;码</i></span>
								<input type="password" class="form-control" required="required"
									placeholder="密码" name="password" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock">&nbsp;密&nbsp;&nbsp;&nbsp;&nbsp;码</i></span>
								<input type="password" class="form-control" required="required"
									placeholder="确定密码" name="passsword" />
							</div>

							<input type='submit' class="btn btn-success " value='注册'
								onclick="return panmi();" />
							<hr />
							已经注册？ <a href="login.php">点这里</a>
						</form>
					</div>

				</div>
			</div>


		</div>
	</div>


	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
	<script type="text/javascript">
	function panmi(){
		var pass = information.password.value;
		var passs = information.passsword.value;
		if(pass!=passs){
			//alert 创建提示信息
			alert("两次输入的密码不一致！");
			return false;
			}else{
				return true;
			}
		}
    </script>


</body>
</html>
