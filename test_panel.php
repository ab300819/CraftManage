<?php
session_start();
$_SESSION['user'] ='admin';
$_SESSION['admin']=0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>控制面板</title>
    <link rel="stylesheet" type="text/css" href="res/css/style.css">
</head>
<body>
<h1>工艺管理系统(build)</h1>

<div align="center">
    <p>
        冶金：<a href="panel_metallurgy.php">机加工工艺</a>
    </p>
    <p>
        核电：<a href="panel_machine.php">机加工工艺</a>
    </p>
    <p>
        核电：<a href="">铸造</a>
    </p>
    <p>
        核电：<a href="">焊接</a>
    </p>
    <p>
        核电：<a href="">锻造</a>
    </p>
    <p>
        核电：<a href="">热处理</a>
    </p>
    <p>
        核电：<a href="">装配</a>
    </p>
</div>
</body>
</html>
