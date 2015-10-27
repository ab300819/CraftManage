<?php
require_once('sql/mysql.php');
require_once('sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
$product_id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>机加工工艺管理</title>
    <link rel="stylesheet" type="text/css" href="res/css/style.css">
    <script>
        function doDel(id, product) {
            if (confirm("确定要删除吗？")) {
                window.location = 'data/action_machine.php?action=del&id=' + id + '&product=' + product;
            }
        }
    </script>
    <script>
        function confirmDel(id) {
            if (confirm("不可直接删除产品信息！")) {

            }
        }
    </script>
</head>
<body>
<h1>工艺编辑系统(build)</h1>

<div><a href="list_product.php">主页</a></div>
<h2>零件信息</h2>

<p>操作：<a href="edit_product.php">修改</a>&nbsp;<a href="javascript:confirmDel(12)">删除</a></p>

<div>
    <table width="100%" style="text-align: center" border="1">
        <?php
        //TODO 需要处理在数组指定位置插入键值对
        $head = array(
            '工艺编号',
            '物料编码',
            '生产批号',
//        '版本号',
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

        $table_column = array(
            'craft_num',
            'material_num',
            'produce_num',
            'model',
            'material_name',
            'material',
            'per_num',
            'name',
            'standard',
            'blank',
            'component_num',
            'craft_line',
            'component_discern',
            'material_discern',
            'heat'
        );

        $list = $db->get_choice_select(PRODUCT, $table_column, "id={$product_id}");
        if ($list != null) {
            $content = key_value_change_one($list);
            $table = key_value($head, $content);
            key_value_table($table, 4);
        } else {
            echo "<script>
                alert('没有相关产品信息！');
                window.history.back();
              </script>";
        }
        ?>
    </table>
</div>
<h2>机加工工艺</h2>

<div><a href='add_machine.php?id=<?php echo $product_id; ?>'>添加</a></div>
<div>
    <table width='100%' style='text-align: center' border='1'>
        <?php
        $material_num = $list['material_num'];
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
            '运行时间',
            '版本号',
            '编辑');
        simple_table($head);
        $list = $db->get_craft_select(MACHINE, "material_num='{$material_num}'");
        if ($list != null) {
            foreach ($list as $row) {
                echo '<tr>';
                echo "<td>{$row['step_num']}</td>";
                echo "<td>{$row['room']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['content']}</td>";
                echo "<td>{$row['self_check']}</td>";
                echo "<td>{$row['operator']}</td>";
                echo "<td>{$row['special_check']}</td>";
                echo "<td>{$row['checker']}</td>";
                echo "<td>{$row['machine']}</td>";
                echo "<td>{$row['craft_machine']}</td>";
                echo "<td>{$row['prepare_time']}</td>";
                echo "<td>{$row['run_time']}</td>";
                echo "<td>{$row['version']}</td>";
                echo "<td>
                <a href='edit_machine.php?id={$row['id']}&product={$product_id}'>修改</a>
                <a href='javascript:doDel({$row['id']},{$product_id})'>删除</a>
                 </td>";
                echo ' </tr > ';
            }
        }
        ?>
    </table>
</div>
<div><a href='add_machine.php?id=<?php echo $product_id; ?>'>添加</a></div>
</body>
</html>
