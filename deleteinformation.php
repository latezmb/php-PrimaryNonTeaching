<?php
session_start();
include_once 'dbcofig.php';
if (isset($_SESSION['name'])) {
    if (isset($_GET['adminindexid'])) {
        $id = $_GET['adminindexid'];
        $deletesql = "delete from work where id=?";
        $statementpdo = $pdo->prepare($deletesql);
        $pan = $statementpdo->execute(array(
            $id
        ));
        if ($pan) {
            $row = $statementpdo->rowCount();
            if ($row > 0) {
                echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='adminindex.php?typename=adminindex';</script>";
                exit();
            } else {
                echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='adminindex.php?typename=adminindex';</script>";
                exit();
            }
        } else {
            echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminindex.php?typename=adminindex';</script>";
            exit();
        }
    } else 
        if (isset($_GET['adminjobauditid'])) {
            $id = $_GET['adminjobauditid'];
            $deletesql = "delete from work where id=?";
            $statementpdo = $pdo->prepare($deletesql);
            $pan = $statementpdo->execute(array(
                $id
            ));
            if ($pan) {
                $row = $statementpdo->rowCount();
                if ($row > 0) {
                    echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='adminjobaudit.php?typename=adminjobaudit';</script>";
                    exit();
                } else {
                    echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='adminjobaudit.php?typename=adminjobaudit';</script>";
                    exit();
                }
            } else {
                echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminjobaudit.php?typename=adminjobaudit';</script>";
                exit();
            }
        } else 
            if (isset($_GET['adminworkmanagementid'])) {
                $id = $_GET['adminworkmanagementid'];
                $deletesql = "delete from teachhour where id=?";
                $statementpdo = $pdo->prepare($deletesql);
                $pan = $statementpdo->execute(array(
                    $id
                ));
                if ($pan) {
                    $row = $statementpdo->rowCount();
                    if ($row > 0) {
                        echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                        exit();
                    } else {
                        echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                        exit();
                    }
                } else {
                    echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                    exit();
                }
            } else 
                if (isset($_GET['adminworkmanagementid'])) {
                    $id = $_GET['adminworkmanagementid'];
                    $deletesql = "delete from teachhour where id=?";
                    $statementpdo = $pdo->prepare($deletesql);
                    $pan = $statementpdo->execute(array(
                        $id
                    ));
                    if ($pan) {
                        $row = $statementpdo->rowCount();
                        if ($row > 0) {
                            echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                            exit();
                        } else {
                            echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                            exit();
                        }
                    } else {
                        echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminworkmanagement.php?typename=adminworkmanagement';</script>";
                        exit();
                    }
                } else 
                    if (isset($_GET['adminwoekshenheid'])) {
                        $id = $_GET['adminwoekshenheid'];
                        $deletesql = "delete from teachhour where id=?";
                        $statementpdo = $pdo->prepare($deletesql);
                        $pan = $statementpdo->execute(array(
                            $id
                        ));
                        if ($pan) {
                            $row = $statementpdo->rowCount();
                            if ($row > 0) {
                                echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='adminwoekshenhe.php?typename=adminwoekshenhe';</script>";
                                exit();
                            } else {
                                echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='adminwoekshenhe.php?typename=adminwoekshenhe';</script>";
                                exit();
                            }
                        } else {
                            echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='adminwoekshenhe.php?typename=adminwoekshenhe';</script>";
                            exit();
                        }
                    } else 
                        if (isset($_GET['teachermanagementid'])) {
                            $id = $_GET['teachermanagementid'];
                            $deletesql = "delete from user where id=?";
                            $statementpdo = $pdo->prepare($deletesql);
                            $pan = $statementpdo->execute(array(
                                $id
                            ));
                            if ($pan) {
                                $row = $statementpdo->rowCount();
                                if ($row > 0) {
                                    echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                                    exit();
                                } else {
                                    echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                                    exit();
                                }
                            } else {
                                echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='teachermanagement.php?typename=teachermanagement';</script>";
                                exit();
                            }
                        } else 
                            if (isset($_GET['feimyworkid'])) {
                                $id = $_GET['feimyworkid'];
                                $deletesql = "delete from work where id=?";
                                $statementpdo = $pdo->prepare($deletesql);
                                $pan = $statementpdo->execute(array(
                                    $id
                                ));
                                if ($pan) {
                                    $row = $statementpdo->rowCount();
                                    if ($row > 0) {
                                        echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='feimywork.php?typename=feimywork';</script>";
                                        exit();
                                    } else {
                                        echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='feimywork.php?typename=feimywork';</script>";
                                        exit();
                                    }
                                } else {
                                    echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='feimywork.php?typename=feimywork';</script>";
                                    exit();
                                }
                            } else 
                                if (isset($_GET['myworkid'])) {
                                    $id = $_GET['myworkid'];
                                    $deletesql = "delete from teachhour where id=?";
                                    $statementpdo = $pdo->prepare($deletesql);
                                    $pan = $statementpdo->execute(array(
                                        $id
                                    ));
                                    if ($pan) {
                                        $row = $statementpdo->rowCount();
                                        if ($row > 0) {
                                            echo "<script language=\"JavaScript\">alert(\"删除成功！\");location.href='mywork.php?typename=mywork';</script>";
                                            exit();
                                        } else {
                                            echo "<script language=\"JavaScript\">alert(\"未找到删除数据！\");location.href='mywork.php?typename=mywork';</script>";
                                            exit();
                                        }
                                    } else {
                                        echo "<script language=\"JavaScript\">alert(\"系统内部出错！请稍后再试！\");location.href='mywork.php?typename=mywork';</script>";
                                        exit();
                                    }
                                } else {
                                    header("location:mywork.php?typename=mywork");
                                }
} else {
    header("location:feimywork.php?typename=feimywork");
}
