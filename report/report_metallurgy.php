<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');
require_once(dirname(__FILE__) . '/../sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>冶金机加工</title>
</head>
<link href="../res/css/common_table.css" rel="stylesheet" type="text/css">
<body>
<h2>江苏神通阀门股份有限公司工艺卡片</h2>
<table width="100%">
    <tr>
        <th>物料名称：</th>
        <td><?php ?></td>
        <th>工艺路线名称：</th>
        <td><?php ?></td>
        <th>单位：</th>
        <td>只</td>
    </tr>
    <tr>
        <th>规格型号：</th>
        <td><?php ?></td>
        <th>物料编码：</th>
        <td><?php ?></td>
        <th>材质：</th>
        <td><?php ?></td>
    </tr>
    <?php
    $head = array(
        '产品型号',
        '生产批号',
        '工艺编号',
        '产品名称',
        '产品编号',
        '页码'
    );
    $table = key_value($head);
    key_value_table($table, 3);
    ?>
</table>
<table width="100%">
    <tr>
        <th>序号</th>
        <th>工序名称</th>
        <th>工序内容</th>
        <th>准备时间</th>
        <th>运行时间</th>
    </tr>
    <tr>
        <?php ?>
    </tr>
</table>
</body>
</html>