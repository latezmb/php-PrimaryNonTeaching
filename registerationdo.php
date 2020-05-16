<?php
include_once 'dbcofig.php';
if (isset($_REQUEST['username'])) {
    $username = trim($_REQUEST['username']);
    $role = trim($_REQUEST['role']);
    $name = trim($_REQUEST['name']);
    $departmentName = trim($_REQUEST['departmentName']);
    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);
    $passwordm = sha1($password);
    $selectstatement = "select * from user where username=?";
    $return = $pdo->prepare($selectstatement);
    $bool = $return->execute(array(
        $username
    ));
    if ($bool) {
        $returnarray = $return->fetch();
        if ($returnarray == null) {
            
            $insertstatement = "insert into user(username,role,name,departmentName,email,password) values(?,?,?,?,?,?)";
            $return = $pdo->prepare($insertstatement);
            $boo = $return->execute(array(
                $username,
                $role,
                $name,
                $departmentName,
                $email,
                $passwordm
            ));
            if ($boo) {
                $row = $return->rowCount();
                if ($row > 0) {
                    // header("Refresh:3;url=要跳转的页面");
                }
            } else {
                echo "系统内部错！请稍后重试！&nbsp;<a href='../html/registeration.php'>返回注册</a>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"该用户名已存在！\");location.href='registeration.php';</script>";
            exit();
        }
    } else {
        echo "系统内部错！请稍后重试！&nbsp;<a href='../html/registeration.php'>返回注册</a>";
        exit();
    }
} else {
    header("location:../html/registeration.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
* {
	padding: 0;
	margin: 0;
}

body {
	background: #fff;
	font-family: "Microsoft Yahei", "Helvetica Neue", Helvetica, Arial,
		sans-serif;
	color: #333;
	font-size: 16px;
}

.system-message {
	padding: 24px 48px;
}

.system-message h1 {
	font-size: 100px;
	font-weight: normal;
	line-height: 120px;
	margin-bottom: 12px;
}

.system-message .jump {
	padding-top: 10px;
}

.system-message .jump a {
	color: #333;
}

.system-message .success, .system-message .error {
	line-height: 1.8em;
	font-size: 36px;
}

.system-message .detail {
	font-size: 12px;
	line-height: 20px;
	margin-top: 12px;
	display: none;
}
</style>
</head>
<body>
	<div class="system-message">
		<p class="error">注册成功</p>
		<p class="detail"></p>
		<p class="jump">
			页面自动 <a id="href" href="login.php?username=<?=$username ?>">跳转</a>
			等待时间： <b id="wait">5</b>
		</p>
	</div>
	<script type="text/javascript">
		(function(){
			var wait = document.getElementById('wait'),
			href = document.getElementById('href').href;
			var interval = setInterval(function(){
				var time = --wait.innerHTML;
				if(time <= 0) {
					location.href = href;
					clearInterval(interval);
				};
			}, 1000);
		})();
		</script>
</body>
</html>
