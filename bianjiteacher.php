<?php
include 'dbcofig.php';
session_start();
if (isset($_SESSION['name'])) {
    if (isset($_GET['typename'])) {
        $id = $_GET['typename'];
        $statement = "select * from user where id=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $id
        ));
        if ($boo) {
            $row = $statementObject->rowCount();
            if ($row > 0) {
                $data = $statementObject->fetch();
            } else {
                echo "<script language=\"JavaScript\">alert(\"查找不到数据！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
            exit();
        }
    } else 
        if (isset($_REQUEST['username'])) {
            $username = trim($_REQUEST['username']);
            $role = trim($_REQUEST['role']);
            $name = trim($_REQUEST['name']);
            $departmentName = trim($_REQUEST['departmentName']);
            $id = $_POST['id'];
            $selectstatement = "update user set username=?,role=?,name=?,departmentName=? where id=?";
            $return = $pdo->prepare($selectstatement);
            $bool = $return->execute(array(
                $username,
                $role,
                $name,
                $departmentName,
                $id
            ));
            if ($bool) {
                $row = $return->rowCount();
                if ($row > 0) {
                    echo "<script language=\"JavaScript\">alert(\"修改成功！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                    exit();
                } else {
                    echo "<script language=\"JavaScript\">alert(\"修改成功！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                    exit();
                }
            } else {
                echo "<script language=\"JavaScript\">alert(\"修改成功！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
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
							<form role="form" action='bianjiteacher.php' method="post"
								name="information">
								<input type="hidden" name="id" value=<?= $id ?> /> <br />
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-tag"> 教工号</i></span>
									<input type="text" class="form-control" placeholder="用户名 "
										name='username' id="username" maxlength="32"
										required="required" readOnly="true"
										value=<?= $data['username']?> />

								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-level-up">
											&nbsp;角色名</i></span> <select class="form-control" name="role"
										width=30>
										<option value='教师' <?= $data['role']=="教师"?"selected":"" ?>>教师</option>
										<option value='管理员' <?= $data['role']=="管理员"?"selected":"" ?>>管理员</option>
									</select>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;姓&nbsp;&nbsp;&nbsp;&nbsp;名</i></span>
									<input type="text" class="form-control" placeholder="姓名"
										id="myname" maxlength="32" name='name' required="required"
										value=<?= $data['name']?> />
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-level-up">
											&nbsp;部门名</i></span> <select class="form-control"
										name="departmentName" id="departmentName" width=30>
										<option value='办公室'
											<?= $data['departmentName']=="办公室"?"selected":"" ?>>办公室</option>
										<option value='实训中心'
											<?= $data['departmentName']=="实训中心"?"selected":"" ?>>实训中心</option>
										<option value='室内设计专业群'
											<?= $data['departmentName']=="室内设计专业群"?"selected":"" ?>>室内设计专业群</option>
										<option value='工业设计专业群'
											<?= $data['departmentName']=="工业设计专业群"?"selected":"" ?>>工业设计专业群</option>
										<option value='广告设计专业群'
											<?= $data['departmentName']=="广告设计专业群"?"selected":"" ?>>广告设计专业群</option>
										<option value='电子商务专业群'
											<?= $data['departmentName']=="电子商务专业群"?"selected":"" ?>>电子商务专业群</option>
										<option value='网络专业群'
											<?= $data['departmentName']=="网络专业群"?"selected":"" ?>>网络专业群</option>
										<option value='软件专业群'
											<?= $data['departmentName']=="软件专业群"?"selected":"" ?>>软件专业群</option>
									</select>
								</div>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='submit'
									class="btn btn-success " value='修改' />
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
