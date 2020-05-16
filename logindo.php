<?php
header("content-type:text/html;charset=uft-8");
include_once 'dbcofig.php';
if (isset($_POST['username'])){

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$passsword = sha1($password);
	if (isset($_REQUEST['jizhumima'])){
	    setcookie("username",$username,time()+60*60*24*30 );
	    setcookie("password",$password,time()+60*60*24*30 );
	}else{
	    setcookie("username","",time()-3600 );
	    setcookie("password","",time()-3600 );
	}
	$statement = "select * from user where 	username=? and 	password=?";
	$zhubei = $pdo->prepare($statement);
	$boo = $zhubei->execute(array($username,$passsword));
	if ($boo){
		//读取zai$zhubei->rowCount()返回的行数
		$row = $zhubei->rowCount();
		if ($row>0){
			$information = $zhubei->fetch();
			session_start();
			$_SESSION['name'] = $information[4];
			$_SESSION['username'] = $information[1];
			$_SESSION['role'] = $information[3];
			header("location:feimywork.php");
			exit();
		}else{
		    echo "<script language=\"JavaScript\">alert(\"输入的账号或者密码错误！\");location.href='login.php';</script>";
			exit();
		}
	}else {
	    echo "<script language=\"JavaScript\">alert(\"系统内部错！请重试！\");location.href='login.php';</script>";
		exit();
	}
}else if (isset($_POST['name'])){

	$username = trim($_POST['name']);
	$password = trim($_POST['password']);
	$passsword = sha1($password);
	if (isset($_REQUEST['jizhumima'])){
	    setcookie("username",$username,time()+60*60*24*30 );
	    setcookie("password",$password,time()+60*60*24*30 );
	}else{
	    setcookie("username","",time()-3600 );
	    setcookie("password","",time()-3600 );
	}
	$statement = "select * from administrator where username=? and 	password=?";
	$zhubei = $pdo->prepare($statement);
	$boo = $zhubei->execute(array($username,$passsword));
	if ($boo){
		//读取zai$zhubei->rowCount()返回的行数
		$row = $zhubei->rowCount();
		if ($row>0){
			$information = $zhubei->fetch();
			session_start();
			$_SESSION['name'] = $information[4];
			$_SESSION['username'] = $information[1];
			$_SESSION['role'] = $information[3];
			header("location:adminindex.php");
			exit();
		}else{
		    echo "<script language=\"JavaScript\">alert(\"输入的账号或者密码错误！\");location.href='adminlogin.php';</script>";
			exit();
		}
	}else {
	    echo "<script language=\"JavaScript\">alert(\"系统内部错！请重试！\");location.href='adminlogin.php';</script>";
		exit();
	}
}else{
	header("location:login.php");
}
?>
