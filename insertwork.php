<?php
session_start();
if (isset($_SESSION['name'])) {
    if (isset($_POST['year'])) {
        include 'dbcofig.php';
        $year = $_POST['year'];
        $status = $_POST['status'];
        $teacherId = $_POST['teacherId'];
        $bigType = $_POST['bigType'];
        $typeName = $_POST['typeName'];
        $rankName = $_POST['rankName'];
        $content = $_POST['content'];
        $classHoer = $_POST['classHoer'];
        $money = $_POST['money'];
        $statement = "insert into work(year,status,teacherId,bigType,typeName,rankName,content,classHour,money) values(?,?,?,?,?,?,?,?,?)";
        $statementObject = $pdo->prepare($statement);
        $boo = $statementObject->execute(array(
            $year,
            $status,
            $teacherId,
            $bigType,
            $typeName,
            $rankName,
            $content,
            $classHoer,
            $money
        ));
        if ($boo) {
            $row = $statementObject->rowCount();
            if ($row > 0) {
                echo "<script language=\"JavaScript\">alert(\"添加成功！\");location.href='adminindex.php?typename=adminindex';</script>";
                exit();
            } else {
                echo "<script language=\"JavaScript\">alert(\"添加失败！\");location.href='adminindex.php?typename=adminindex';</script>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminindex.php?typename=adminindex';</script>";
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
				<h2>录入非授课工作信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-0">
				<!-- class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1"> -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>录入非授课工作信息</strong>
					</div>
					<div class="panel-body">
						<form role="form" id="workform" action="insertwork.php"
							method='post'>
							<input type='hidden' name='status' value='确认' /> <br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 年度</i></span>
								<select class="form-control" name="year">
									<option value="0">全部</option>
									<option value="2017">2017年</option>
									<option value="2018">2018年</option>
									<option value="2019" selected>2019年</option>
									<option value="2020">2020年</option>
									<option value="2021">2021年</option>
								</select> <span class="input-group-addon"><i class="fa fa-flag">&nbsp;教工号</i></span>
								<input type="text" class="form-control" placeholder="教工号"
									name='teacherId' maxlength="15" id='teacherId' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-flag">&nbsp;大类</i></span>
								<select class="form-control" id="bigType" name="bigType">
									<option value=''>--请选择大类--</option>
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
								</select> <span class="input-group-addon"><i class="fa fa-flag">&nbsp;类别</i></span>
								<select class="form-control" name="typeName" id="typeNameOption">
									<option value=''>--请选择类别--</option>
									<option value='临时任务'>临时任务</option>
									<option value='教材著作'>教材著作</option>
									<option value='制定课程标准'>制定课程标准</option>
									<option value='听课任务'>听课任务</option>
									<option value='出卷'>出卷</option>
									<option value='第二课堂指导'>第二课堂指导</option>
									<option value='专业教育'>专业教育</option>
									<option value='企业锻炼'>企业锻炼</option>
									<option value='毕业综合实践'>毕业综合实践</option>
									<option value='其他'>其他</option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-level-up">
										&nbsp;级别</i></span> <select class="form-control"
									name="rankName" id="rankNameOption">
									<option value=''>--请选择级别--</option>
									<option value='普通教师'>普通教师</option>
									<option value='校级'>校级</option>
									<option value='一般刊物'>一般刊物</option>
									<option value='国家级立项'>国家级立项</option>
									<option value='省级比赛'>省级比赛</option>
									<option value='其他'>其他</option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;内容</i></span>
								<textarea class="form-control" rows="5"
									placeholder="工作内容(本编辑框可缩放)" id='content' maxlength="499"
									name='content'></textarea>
							</div>

							<div class="form-group input-group" id="amountdiv">
								<span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;
										折算课时</i></span> <input type="text" class="form-control"
									id="amountClass" name="classHoer" placeholder="折算课时" />
							</div>

							<div class="form-group input-group" id="amountdiv">
								<span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;
										奖金（元）</i></span> <input type="text" class="form-control"
									id="amountMoney" name="money" maxlength="10" placeholder="奖金" />
							</div>
							<input type='reset' class="btn btn-primary" value=' 重 置 ' />&nbsp;&nbsp;
							<input type='submit' name="save" class="btn btn-primary"
								value='添加' />&nbsp;&nbsp; <a class="btn btn-primary"
								href="adminindex.php">放弃</a>
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
