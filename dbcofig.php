<?php
$dbtype = "mysql";
$host = "localhost";
$dbname = 'workload';
$charset = 'utf8';
$username = 'root';
$password = '';
$pageRecord = 5;


header("content-type:text/html;charset=utf-8");
$dsn="$dbtype:host=$host;dbname=$dbname;charset=$charset";  
try{  
    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){  
    exit($e->getMessage());  
}  


?>