<?php
include 'dbcofig.php';
session_start();
if (isset($_SESSION['name'])) {
    if (isset($_REQUEST['username'])) {
        $username = trim($_REQUEST['username']);
        $role = trim($_REQUEST['role']);
        $name = trim($_REQUEST['name']);
        $departmentName = trim($_REQUEST['departmentName']);
        $selectstatement = "select * from user where username=?";
        $return = $pdo->prepare($selectstatement);
        $bool = $return->execute(array(
            $username
        ));
        if ($bool) {
            $returnarray = $return->fetch();
            if ($returnarray == null) {
                
                $insertstatement = "insert into user(username,role,name,departmentName) values(?,?,?,?)";
                $return = $pdo->prepare($insertstatement);
                $boo = $return->execute(array(
                    $username,
                    $role,
                    $name,
                    $departmentName
                ));
                if ($boo) {
                    $row = $return->rowCount();
                    if ($row > 0) {
                        // header("Refresh:3;url=要跳转的页面");
                        echo "<script language=\"JavaScript\">alert(\"添加成功！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                        exit();
                    }
                } else {
                    echo "<script language=\"JavaScript\">alert(\"系统内部错！请稍后重试！\");location.href='insertteacher.php';</script>";
                    exit();
                }
            } else {
                echo "<script language=\"JavaScript\">alert(\"该用户名已存在！\");location.href='insertteacher.php';</script>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"系统内部错！请稍后重试！\");location.href='insertteacher.php';</script>";
            exit();
        }
    }
} else {
    header("location:login.php");
}
?>
<?php include 'base.php';?>

		<div id="page-wrapper">
		<!-- 表开始 -->
			<div id="page-inner">
<div class="container">
		<div class="row text-center  ">
			<div class="col-md-12">
				<br /> <br />
				<h2>添加教师信息</h2>
				<br />
			</div>
		</div>
		<div class="row">

			<div
				class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>添加教师 </strong>
					</div>
					<div class="panel-body">
						<form role="form" action='insertteacher.php' method="post"
							name="information">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 教工号</i></span>
								<input type="text" class="form-control" placeholder="用户名 "
									name='username' id="username" maxlength="32"
									required="required" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-level-up">
										&nbsp;角色名</i></span> <select class="form-control" name="role"
									width=30>
									<option value='教师' selected>教师</option>
									<option value='管理员' >管理员</option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;姓&nbsp;&nbsp;&nbsp;&nbsp;名</i></span>
								<input type="text" class="form-control" placeholder="姓名"
									id="myname" maxlength="32" name='name' required="required" />
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
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='submit'
								class="btn btn-success " value='增添' />
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href='teachermanagement.php?typename=teachermanagement'
								class="btn btn-success ">返回</a>
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
	        	<script>
function CommandConfirm(){
	if(window.confirm("你确定删除此记录吗？删除后此记录将丢失！")){
		return true;
	}else{
		return false;
	}
}
</script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>


</body>
</html>
