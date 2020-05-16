<?php
session_start();
if (isset($_SESSION['name'])){
include 'dbcofig.php';
$name = $_SESSION['name'];
if (isset($_POST['year']) && isset($_POST['bigType'])){
    $year = $_POST['year'];
    $bigType = $_POST['bigType'];
    if ($bigType==""){
        $statement = "select * from work where year=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array($year));
    }else{
        $statement = "select * from work where year=? and bigType=?";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array($year,$bigType));
    }
    
}else{
    $statement = "select * from work";
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
}else {
    header("location:login.php");
}
?>
<?php include 'base.php';?>

		<div id="page-wrapper">
		<!-- 表开始 -->
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
					
                <form action="adminindex.php?typename=adminindex" method="post">
                &nbsp;&nbsp;&nbsp;&nbsp;
						年度：<select  name="year">
									<option value="2017">2017年</option>
									<option value="2018">2018年</option>
									<option value="2019" selected>2019年</option>
									<option value="2020">2020年</option>
									<option value="2021">2021年</option>
								</select>
						大类：<select  id="bigType" name="bigType">
									<option value="">全部</option>
									<option value='专业建设'>专业建设</option>
									<option value='临时任务'>临时任务</option>
									<option value='其它工作'>其它工作</option>
									<option value='基本考核'>基本考核</option>
									<option value='技能竞赛'>技能竞赛</option>
									<option value='校外指导'>校外指导</option>
									<option value='科研'>科研</option>
									<option value='课程建设'>课程建设</option>
									<option value='院校建设'>院校建设</option>
									<option value='其它工作'>其它工作</option>
								</select>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" class="btn btn-primary" value="查询" />
								</form>
					</div>
				</div>
				<!-- /. ROW  -->
				<hr />

				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading"><a href='insertwork.php?typename=insertwork' class="btn btn-primary">新增非授课工作</a></div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example">
										<thead>
											<tr>
												<th>年度</th>
												<th>教工号</th>
												<th>类别</th>
												<th>级别</th>
												<th>内容</th>
												<th>折算课时</th>
												<th>奖金（元）</th>
												<th>状态</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
									<?php
										foreach ($data as $information){
										    $temp = $information['content'];
										    $content = substr($temp, 0,50);
										    $content = $content.".....";
										?>
											<tr class='odd gradeX'>
												<td><?= $information['year']?></td>
												<td><?= $information['teacherId']?></td>
												<td><?= $information['typeName']?></td>
												<td class='center'><?= $information['rankName']?></td>
												<td class='center'><?= $content?></td>
                                                <td><?= $information['classHour']?></td>
												<td><?= $information['money']?></td>
												<td><?= $information['status']?></td>
												<td><a href="bianjifeiwork.php?typename=<?= $information['id']?>" class='btn btn-primary btn-xs'><i class='fa fa-edit'>&nbsp;编辑</i></a>
												&nbsp;&nbsp;<a href="deleteinformation.php?adminindexid=<?= $information['id']?>" onclick='return CommandConfirm()' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'>&nbsp;删除</i></a>
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
