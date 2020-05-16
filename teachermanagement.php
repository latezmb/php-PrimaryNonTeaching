<?php
session_start();
if (isset($_SESSION['name'])) {
    include 'dbcofig.php';
    $name = $_SESSION['name'];
    if (isset($_POST['departmentName'])) {
        $departmentName = $_POST['departmentName'];
        $statement = "select * from user where departmentName=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $departmentName
        ));
    } else {
        $statement = "select * from user";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute();
    }
    if ($boo) {
        $row = $statementObject->rowCount();
        $data = $statementObject->fetchAll();
    } else {
        echo "系统内部出错！请稍后再试！";
        exit();
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
				<form action="teachermanagement.php?typename=teachermanagement"
					method="post">
					&nbsp;&nbsp;&nbsp;&nbsp; 所属部门：<select name=departmentName>
						<option value='办公室' selected>办公室</option>
						<option value='实训中心'>实训中心</option>
						<option value='室内设计专业群'>室内设计专业群</option>
						<option value='工业设计专业群'>工业设计专业群</option>
						<option value='广告设计专业群'>广告设计专业群</option>
						<option value='电子商务专业群'>电子商务专业群</option>
						<option value='网络专业群'>网络专业群</option>
						<option value='软件专业群'>软件专业群</option>
					</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
						type="submit" class="btn btn-primary" value="查询" />
				</form>

			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href='insertteacher.php?typename=insertteacher'
							class="btn btn-primary">新增教师信息</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								<thead>
									<tr>
										<th>教工号</th>
										<th>角色</th>
										<th>姓名</th>
										<th>所属部门</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php
        foreach ($data as $information) {
            ?>
											<tr class='odd gradeX'>
										<td><?= $information['username']?></td>
										<td><?= $information['role']?></td>
										<td class='center'><?= $information['name']?></td>
										<td class='center'><?= $information['departmentName']?></td>
										<td><a
											href="bianjiteacher.php?typename=<?= $information['id']?>"
											class='btn btn-primary btn-xs'><i class='fa fa-edit'>&nbsp;编辑</i></a>&nbsp;&nbsp;
											<a
											href="deleteinformation.php?teachermanagementid=<?= $information['id']?>"
											onclick='return CommandConfirm()'
											class='btn btn-danger btn-xs'><i class='fa fa-trash-o'>&nbsp;删除</i></a>
										</td>
									</tr>
                                           <?php
        }
        ?>
										
										</tbody>
							</table>
						</div>

					</div>
				</div>
				<!--End Advanced Tables -->
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
