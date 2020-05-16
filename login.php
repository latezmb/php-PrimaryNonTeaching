<!DOCTYPE html>
<?php
header ( "content-type:text/html;charset=utf-8" );
?>
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
		<div class="row text-center ">
			<div class="col-md-12">
				<br /> <br />
				<h2>非授课工作量管理系统</h2>

				<br />
			</div>
		</div>
		<div class="row ">

			<div
				class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> 教师登陆</strong>
					</div>
					<div class="panel-body">
						<form role="form" action='logindo.php' method="post">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<?php
								if (isset ( $_GET ['username'] )) {
									$name = $_GET ['username'];
									echo "<input type='text' class='form-control' value=".$name."
									name='username' required='required'/>";
								}else if(isset($_COOKIE['username'])){
								    echo "<input type='text' class='form-control' value=".$_COOKIE['username']."
									name='username' required='required'/>";
								}
								else {
									echo "<input type='text' class='form-control' placeholder='账号'
									name='username' required='required'/>";
								}
								?>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<?php 
								if (isset($_COOKIE['password'])){
								    echo "<input type='password' class='form-control' placeholder='密码' required='required' name='password' value='".$_COOKIE['password']."'/>";
								}else{
								    echo "<input type='password' class='form-control' placeholder='密码' required='required' name='password' />";
								}
								?>
								
							</div>
							<div class="form-group">
								<label class="checkbox-inline"> 
								<input type='checkbox' name='jizhumima' /> 记住密码
								</label> <span class="pull-right"> <a href="#">忘记密码 ? </a>
								</span>
							</div>
							<input type='submit' class="btn btn-primary " value='登陆' />
							<hr />
							没有注册？<a href="registeration.php">单击此处 </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="adminlogin.php">管理员登陆</a>
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

</body>
</html>
