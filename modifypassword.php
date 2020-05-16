<?php
session_start();
include 'dbcofig.php';

if (isset($_SESSION['name'])) {
    if (isset($_REQUEST['oldpassword'])) {
        $name = $_SESSION['username'];
        $oldpassword = sha1(trim($_POST['oldpassword']));
        $newpassword = sha1(trim($_POST['password']));
        $statement = "select * from user where username=? and password=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $name,
            $oldpassword
        ));
        if ($boo) {
            $row = $statementObject->rowCount();
            if ($row > 0) {
                $updatastatement = "update user set password=? where username=?";
                $updatastatementObject = $pdo->prepare($updatastatement);
                $boo1 = $updatastatementObject->execute(array(
                    $newpassword,
                    $name
                ));
                if ($boo1) {
                    $roow = $updatastatementObject->rowCount();
                    if ($roow > 0) {
                        echo "<script language=\"JavaScript\">alert(\"密码修改成功！请重新登陆！\");location.href='login.php';</script>";
                        exit();
                    } else {
                        echo "<script language=\"JavaScript\">alert(\"修改失败！找不到要修改数据，请稍后再试！\");location.href='adminindex.php';</script>";
                        exit();
                    }
                } else {
                    echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminindex.php';</script>";
                    exit();
                }
            } else {
                echo "<script language=\"JavaScript\">alert(\"修改失败！找不到要修改数据，请稍后再试！\");location.href='adminindex.php';</script>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminindex.php';</script>";
            exit();
        }
    } else 
        if (isset($_REQUEST['adminoldpassword'])) {
            $name = $_SESSION['username'];
            $oldpassword = sha1(trim($_POST['adminoldpassword']));
            $newpassword = sha1(trim($_POST['password']));
            $statement = "select * from administrator where username=? and password=?";
            $statementObject = $pdo->prepare($statement);
            $boo = $statementObject->execute(array(
                $name,
                $oldpassword
            ));
            if ($boo) {
                $row = $statementObject->rowCount();
                if ($row > 0) {
                    $updatastatement = "update administrator set password=? where username=?";
                    $updatastatementObject = $pdo->prepare($updatastatement);
                    $boo1 = $updatastatementObject->execute(array(
                        $newpassword,
                        $name
                    ));
                    if ($boo1) {
                        $roow = $updatastatementObject->rowCount();
                        if ($roow > 0) {
                            echo "<script language=\"JavaScript\">alert(\"密码修改成功！请重新登陆！\");location.href='login.php';</script>";
                            exit();
                        } else {
                            echo "<script language=\"JavaScript\">alert(\"修改失败！找不到要修改数据，请稍后再试！\");location.href='adminindex.php';</script>";
                            exit();
                        }
                    } else {
                        echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminindex.php';</script>";
                        exit();
                    }
                } else {
                    echo "<script language=\"JavaScript\">alert(\"修改失败！找不到要修改数据，请稍后再试！\");location.href='adminindex.php';</script>";
                    exit();
                }
            } else {
                echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminindex.php';</script>";
                exit();
            }
        }
} else {
    header("location:login.php");
}
?>
<?php 
if ($_SESSION['role'] == "管理员" || $_SESSION['role'] == "超级管理员") {
    include 'base.php';
}else{
    include 'teacherfbase.php';
}
?>

<div id="page-wrapper">
	<!-- 表开始 -->
	<div class="container">
		<div class="row text-center  ">
			<div class="col-md-12">
				<br /> <br />
				<h2>修改密码</h2>
				<br />
			</div>
		</div>
		<div class="row">

			<div
				class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> 修改密码 </strong>
					</div>
					<div class="panel-body">
						<form role="form" action='modifypassword.php' method="post"
							name="information">

							<br />
														<?php
    if ($_SESSION['role'] == "管理员" || $_SESSION['role'] == "超级管理员") {
        echo "
                            <div class='form-group input-group'>
								<span class='input-group-addon'><i class='fa fa-lock'> 旧密码</i></span>
								<input type='text' class='form-control' placeholder='旧密码 '
									name='adminoldpassword' id='username' maxlength='32'
									required='required' />
							</div>
        ";
    }else{
        echo "
                             <div class='form-group input-group'>
								<span class='input-group-addon'><i class='fa fa-lock'> 旧密码</i></span>
								<input type='text' class='form-control' placeholder='旧密码 '
									name='oldpassword' id='username' maxlength='32'
									required='required' />
							</div>
            ";
    }
    ?>
							
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock">&nbsp;新密码</i></span>
								<input type="password" class="form-control" required="required"
									placeholder="密码" name="password" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock">&nbsp;新密码</i></span>
								<input type="password" class="form-control" required="required"
									placeholder="确定密码" name="passsword" />
							</div>

							<input type='submit' class="btn btn-success " value='修改密码'
								onclick="return panmi();" />
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php 
							    if ($_SESSION['role'] == "管理员" || $_SESSION['role'] == "超级管理员") {
							        echo "
                                        <a href='adminindex.php?typename=adminindex' class='btn btn-success'>&nbsp;&nbsp;&nbsp;返&nbsp;&nbsp;&nbsp;回&nbsp;&nbsp;&nbsp;</a>
                                           ";
							    }else{
							        echo "
                                        <a href='feimywork.php?typename=feimywork' class='btn btn-success'>&nbsp;&nbsp;&nbsp;返&nbsp;&nbsp;&nbsp;回&nbsp;&nbsp;&nbsp;</a>
                                           ";
							    }
							?>
							<hr />
						</form>
					</div>

				</div>
			</div>


		</div>
	</div>
	<!-- 表结束 -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
		$(document).ready(function() {
			$('#dataTables-example').dataTable();
		});
	</script>

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
