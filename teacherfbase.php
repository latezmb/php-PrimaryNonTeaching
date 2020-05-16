<?php
if (isset($_GET['typename'])) {
    $typename = $_GET['typename'];
} else {
    header("location:feimywork.php?typename=feimywork");
}
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
<!-- MORRIS CHART STYLES-->

<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link rel='stylesheet' type='text/css' />
<!-- TABLE STYLES-->
<link href="assets/js/dataTables/dataTables.bootstrap.css"
	rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="feimywork.php">07180854卓民斌</a>
			</div>
			<div
				style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				用户名：<?=$_SESSION['name'] ?> &nbsp;&nbsp;<a
					href='modifypassword.php?typename=password'
					class="btn btn-danger square-btn-adjust">修改密码</a>&nbsp; <a
					href="tuichu.php" class="btn btn-danger square-btn-adjust">退出登陆</a>
			</div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center"><img src="assets/img/my.png"
						class="user-image img-responsive" /></li>
					<li><a <?=$typename=="feimywork"?"class='active-menu'":""?>
						href="feimywork.php?typename=feimywork"><i
							class="fa fa-desktop fa-3x"></i>非授课工作管理</a></li>
					<li><a <?=$typename=="mywork"?"class='active-menu'":""?>
						href="mywork.php?typename=mywork"><i class="fa fa-desktop fa-3x"></i>
							授课工作管理</a></li>

					<li><a <?=$typename=="mytongjiwork"?"class='active-menu'":""?>
						href='mytongjiwork.php?typename=mytongjiwork'><i
							class='fa fa-bar-chart fa-3x'></i>工作量统计</a></li>


				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->