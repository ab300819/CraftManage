<?php
require_once('sql/mysql.php');
require_once('sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>工艺管理系统</title>
</head>
<link rel="stylesheet" type="text/css" href="res/css/custom/list.css">

<body>
<h1>工艺管理系统(build)</h1>
<a href="report/report_machine.php" target="_blank">查询工艺</a>
<a href="panel.php">编辑工艺</a>

<p></p>

<div style="width: 100%;text-align: center">
    <form action="add/add_product.html" method="post">
        物料编码：<input type="text" name="">
        <p>
            <input type="submit" value="提交">
            <input type="reset" value="重置">
            <input type="button" value="高级检索" onclick="">
        </p>
    </form>
</div>
</body>
</html>