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
<link href="res/css/custom/editList.css" rel="stylesheet" type="text/css">

<body>
<h1>工艺管理系统(build)</h1>
<a href="report/report_machine.php" target="_blank">查询工艺</a>
<a href="panel.php">编辑工艺</a>

<p></p>

<div style="width: 100%;text-align: center">
    <form action="add/add_product.php" method="post">

        <table align="center">
            <tr>
                <th>产品类别:</th>
                <td>
                    <select name="product_type" id="product_type">
                        <option value="0">冶金</option>
                        <option value="1">核电</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>工艺类型：</th>
                <td>
                    <select name="craft_type">
                        <option value="0">机加工</option>
                        <option value="1">铸造</option>
                        <option value="2">焊接</option>
                        <option value="3">锻造</option>
                        <option value="4">热处理</option>
                        <option value="5">装配</option>
                    </select>
                </td>
            </tr>
        </table>
        <p></p>
        <input type="submit" value="提交">
        <input type="reset" value="重置">
    </form>
</div>
</body>
</html>