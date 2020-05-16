<?php
session_start();
include 'dbcofig.php';
if (isset($_SESSION['name'])) {
    if (isset($_GET['typename'])) {
        $id = $_GET['typename'];
        $statement = "select * from teachhour where id=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $id
        ));
        if ($boo) {
            $row = $statementObject->rowCount();
            if ($row > 0) {
                $data = $statementObject->fetch();
            } else {
                echo "<script language=\"JavaScript\">alert(\"查找不到数据！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
            exit();
        }
    } else 
        if (isset($_POST['year'])) {
            $year = $_POST['year'];
            $teacherId = $_POST['teacherId'];
            $classHoer = $_POST['classHoer'];
            $recorder = $_POST['recorder'];
            $status = $_POST['status'];
            $id = $_POST['id'];
            $statement = "update teachhour set year=?,teacherId=?,classHour=?,recorder=?,status=? where id=?";
            $statementObject = $pdo->prepare($statement);
            $boo = $statementObject->execute(array(
                $year,
                $teacherId,
                $classHoer,
                $recorder,
                $status,
                $id
            ));
            if ($boo) {
                $row = $statementObject->rowCount();
                if ($row > 0) {
                    echo "<script language=\"JavaScript\">alert(\"修改成功！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                    exit();
                } else {
                    echo "<script language=\"JavaScript\">alert(\"修改失败！\");location.href='adminindex.php?typename=adminindex';</script>";
                    exit();
                }
            } else {
                echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
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
		<div class="row">
			<div class="col-md-12">
				<h2>编辑授课工作信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-0">
				<!-- class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1"> -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>编辑授课工作信息</strong>
					</div>
					<div class="panel-body">
						<form role="form" id="workform" action="bianjiworks.php"
							method='post'>
							<input type="hidden" name="id" value=<?= $id?>> <br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">&nbsp;&nbsp;&nbsp;&nbsp;
										年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;度</i></span> <select
									class="form-control" name="year">
									<option value="">选择年度</option>
									<option value="2017" <?= $data['year']=="2017"?"selected":"" ?>>2017年</option>
									<option value="2018" <?= $data['year']=="2018"?"selected":"" ?>>2018年</option>
									<option value="2019" <?= $data['year']=="2019"?"selected":"" ?>>2019年</option>
									<option value="2020" <?= $data['year']=="2020"?"selected":"" ?>>2020年</option>
									<option value="2021" <?= $data['year']=="2021"?"selected":"" ?>>2021年</option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-flag">&nbsp;&nbsp;&nbsp;&nbsp;教&nbsp;工&nbsp;号</i></span>
								<input type="text" class="form-control" placeholder="教工号"
									name='teacherId' maxlength="15" id='teacherId'
									value=<?=$data['teacherId']?> />
							</div>
							<div class="form-group input-group" id="amountdiv">
								<span class="input-group-addon"> <i class="fa fa-clock-o">&nbsp;
										教学课时</i>
								</span> <input type="text" class="form-control" id="amountClass"
									name="classHoer" placeholder="折算课时"
									value=<?= $data['classHour']?> />
							</div>
							<div class="form-group input-group" id="amountdiv">
								<span class="input-group-addon"> <i class="fa fa-clock-o">&nbsp;&nbsp;&nbsp;&nbsp;记&nbsp;录&nbsp;人</i>
								</span> <input type="text" class="form-control" id="amountClass"
									name="recorder" placeholder="记录人" value=<?= $data['recorder']?> />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">&nbsp;&nbsp;&nbsp;&nbsp;
										审&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;核</i></span> <select
									class="form-control" name="status">
									<option value="保存" <?= $data['status']=="保存"?"selected":"" ?>>保存</option>
									<option value="待审" <?= $data['status']=="待审"?"selected":"" ?>>待审</option>
									<option value="确认" <?= $data['status']=="确认"?"selected":"" ?>>确认</option>
									<option value="退回" <?= $data['status']=="退回"?"selected":"" ?>>退回</option>
								</select>
							</div>
							<input type='reset' class="btn btn-primary" value=' 重 置 ' />&nbsp;&nbsp;
							<input type='submit' name="save" class="btn btn-primary"
								value='修改' />&nbsp;&nbsp; <a class="btn btn-primary"
								href="adminworkmanagement.php?typename=adminworkmanagement">放弃</a>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- /. PAGE INNER  -->
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
