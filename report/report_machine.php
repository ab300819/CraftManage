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
    <title>机加工工艺</title>
    <link rel="stylesheet" type="text/css" href="../res/css/custom/list.css">
</head>
<body>
<h2 style="text-align: center">江苏神通阀门股份有限公司</h2>

<h3 style="text-align: center">机械加工工艺过程卡片</h3>
<table class="show-list" width="100%" style="text-align: center">
    <?php
    $head = array('工艺编号',
        '物料编码',
        '生产批号',
        '版本号',
        '产品型号',
        '物料名称',
        '材料牌号',
        '每台件数',
        '产品名称',
        '规格型号',
        '毛坯种类',
        '零件编号',
        '工艺路线名称',
        '零件标识',
        '材料标识',
        '热处理状态');
    $table = key_value($head);
    key_value_table($table, 4);
    ?>
</table>
<table class="show-list" width="100%" style="text-align: center">
    <?php
    $head = array('工序号',
        '车间',
        '工序名称',
        '工序内容',
        '自检记录',
        '操作者',
        '专检记录',
        '检验员',
        '设备',
        '工艺设备',
        '准备时间',
        '运行时间');
    simple_table($head);
    ?>
</table>
</body>
</html>