<?php
session_start();
if ($_SESSION['name']) {
    include 'dbcofig.php';
    $name = $_SESSION['name'];
    $teacherId = $_SESSION['username'];
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
        $statement = "select A.name,B.* from user A join teachhour B on A.username=B.teacherId where B.teacherId=? and B.year=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $teacherId,
            $year
        ));
    } else {
        
        $statement = "select A.name,B.* from user A join teachhour B on A.username=B.teacherId where B.teacherId=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $teacherId
        ));
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
<?php include 'teacherfbase.php';?>

<div id="page-wrapper">
	<!-- 表开始 -->
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<form action="mywork.php?typename=mywork" method="post">
					&nbsp;&nbsp;&nbsp;&nbsp; 年度：<select name="year">
						<option value="2017">2017年</option>
						<option value="2018">2018年</option>
						<option value="2019" selected>2019年</option>
						<option value="2020">2020年</option>
						<option value="2021">2021年</option>
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
						<a href='insertmytworks.php?typename=insertmytworks'
							class="btn btn-primary">新增授课工作</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								<thead>
									<tr>
										<th>年度</th>
										<th>教工号</th>
										<th>姓名</th>
										<th>教学课时</th>
										<th>状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php
        foreach ($data as $information) {
            ?>
											<tr class='odd gradeX'>
										<td><?= $information['year']?></td>
										<td><?= $information['teacherId']?></td>
										<td><?= $information['name']?></td>
										<td><?= $information['classHour']?></td>
										<td><?= $information['status']?></td>
										<td>
										<?php
            if ($information['status'] == "确认") {
                echo "
                                                     <a   class='btn btn-warning btn-xs'>&nbsp;已确认</i></a>&nbsp;&nbsp;
                                                       ";
            } else {
                echo "
                                                            <a href='bianjimywork.php?typename=" . $information['id'] . "' class='btn btn-primary btn-xs'><i class='fa fa-edit'>&nbsp;编辑</i></a>&nbsp;&nbsp;
      
                                                             ";
            }
            ?>
										&nbsp;&nbsp; 
												
												<a
											href="deleteinformation.php?myworkid=<?= $information['id']?>"
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
