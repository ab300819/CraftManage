<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/10
 * Time: 15:29
 * 装配工艺编辑面板
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
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
    <title>装配工艺管理</title>
    <link href="../res/css/custom/editList.css" type="text/css" rel="stylesheet">
</head>
<body>

<h1 style="text-align: center">装配加工路线单</h1>

<h2 style="text-align: center">产品信息</h2>
<table class="show_list" width="100%">
    <?php
    $head = array(
        '产品名称',
        '产品型号',
        '产品编号',
        '产品规格',
        '产品装配图号',
    );
    $table = key_value($head);
    key_value_table($table, 3);
    ?>
</table>
<h2 style="text-align: center">核电阀门装配明细表</h2>
<table class="show_list" width="100%">
    <?php
    $head = array(
        '序号',
        '零件图号',
        '名称及规格',
        '材料',
        '数量',
        '零件编号',
        '备注',
        '编辑'
    );
    simple_table($head);
    ?>
</table>
<h2 style="text-align: center">装配产品信息</h2>
<table class="show_list" width="100%">
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
<h2 style="text-align: center">装配工艺</h2>
<table class="show_list" width="100%">
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
        '工艺设备',
        '版本',
        '编辑'
    );
    simple_table($head);

    ?>
</table>
</body>
</html>
