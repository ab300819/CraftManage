<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/11
 * Time: 22:17
 */
require_once('sql/mysql.php');
require_once('sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>冶金机加工工艺管理</title>
    <link href="res/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1>江苏神通阀门股份有限公司</h1>

<h2>产品信息</h2>

<div>
    <table width="100%">
        <?php
        $head = array(
            '物料名称',
            '工艺路线名称',
            '规格型号',
            '物料编码',
            '材质',
            '单位'
        );
        $table_column = array(
            'material_name',
            'craft_line',
            'standard',
            'material_num',
            'material_model',
        );
        $data = $db->get_choice_select(PRODUCT, $table_column);
        if($data==null){
            echo "<script>
                    alert('没有相关数据！');
                  </script>";
        }
        ?>
    </table>
</div>
<h2>机加工工艺</h2>

<div>
    <table width="100%">
        <?php
        $head = array(
            '序号',
            '工序名称',
            '工序内容',
            '准备时间',
            '运行时间',
            '编辑'
        );

        ?>
    </table>
</div>
</body>
</html>
