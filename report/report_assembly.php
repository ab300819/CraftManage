<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/9/30
 * Time: 12:06
 * 装配
 */
$root = dirname(__FILE__);
require_once($root . '/../sql/mysql.php');
require_once($root . '/../sql/table_config.php');
require_once($root . '/../sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>装配报表</title>
</head>
<link rel="stylesheet" type="text/css" href="../res/css/custom/editList.css">
<body>
<h2>江苏神通阀门股份有限公司</h2>

<h3>装配加工路线单</h3>
<table width="100%" align="center">
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
    <?php
    $head = array(
        '工序',
        '工序名称',
        '工序要求',
        '自检记录',
        '装配人员',
        '检验记录',
        '检验结论',
        '检验员',
        '见证',
        '工艺设备'
    );
    simple_table($head);
    ?>
</table>
</body>
</html>
