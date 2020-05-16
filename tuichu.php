<?php
header("content-type:text/html;charset=utf-8");
session_start();
if (isset($_SESSION['name'])) {
    session_destroy(); // 全部清楚session数据
    echo "<script language=\"JavaScript\">alert(\"账号已安全退出\");location.href='login.php';</script>";
} else {
    header("location:login.php");
}