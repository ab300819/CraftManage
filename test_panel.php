<?php
session_start();
$_SESSION['user'] = 'admin';
$_SESSION['admin'] = 0;
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
        产品：<a href="list_product.php">产品型录</a>
    </p>
    <p>
        冶金：<a href="panel/panel_metallurgy.php">机加工工艺</a>
    </p>

    <p>
        核电：<a href="panel/panel_machine.php">机加工工艺</a>
    </p>

    <p>
        核电：<a href="panel/panel_foundry.php">铸造</a>
    </p>

    <p>
        核电：<a href="panel/panel_welding.php">焊接</a>
    </p>

    <p>
        核电：<a href="panel/panel_forging.php">锻造</a>
    </p>

    <p>
        核电：<a href="panel/panel_heat.php">热处理</a>
    </p>

    <p>
        核电：<a href="panel/panel_assembly.php">装配</a>
    </p>
</div>
</body>
</html>
