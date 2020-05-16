<?php
session_start();
if ($_SESSION['name']) {
    include 'dbcofig.php';
    $name = $_SESSION['name'];
    // 查询user
    
    if (isset($_POST['year'])) {
        $year = $_POST['year'];
        $statement = "select B.name,A.year,B.username,A.classHour,C.zong from user B left join teachhour A  on A.teacherId=B.username LEFT join (select year,teacherId,SUM(classHour) as zong from work where status='确认' group by teacherId,year) C on B.username=C.teacherId and A.year=C.year where  A.status='确认' and A.year=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $year
        ));
    } else {
        
        $statement = "select B.name,A.year,B.username,A.classHour,C.zong from user B left join teachhour A  on A.teacherId=B.username LEFT join (select year,teacherId,SUM(classHour) as zong from work where status='确认' group by teacherId,year) C on B.username=C.teacherId and A.year=C.year where  A.status='确认'";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute();
    }
    if ($boo) {
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
				<form action="tongjiwork.php?typename=tongjiwork" method="post">
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
					<div class="panel-heading">工作统计</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								<thead>
									<tr>
										<th>年度</th>
										<th>教工号</th>
										<th>姓名</th>
										<th>应完成课时</th>
										<th>已完成课时</th>
										<th>基本任务</th>
										<th>奖金</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php
        foreach ($data as $information) {
            ?>
											<tr class='odd gradeX'>
										<td><?= $information['year']+0 ?></td>
										<td><?= $information['username'] ?></td>
										<td><?= $information['name'] ?></td>
										<td><?= $information['classHour']+0 ?></td>
										<td><?= $information['zong']+0 ?></td>
										<td><?= ($information['zong']>=$information['classHour'])?"已完成":"<font color=red>未完成</font>" ?></td>
										<td><?= ($information['zong']>=$information['classHour'])?"2000":"0" ?></td>
										<td><a href="#" class='btn btn-primary btn-xs'><i
												class='fa fa-edit'>&nbsp;无操作</i></a>&nbsp;&nbsp;</td>
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
