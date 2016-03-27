<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/11
 * Time: 22:17
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/operate.php');
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
    <title>冶金机加工工艺管理</title>
    <link href="../res/css/common_table.css" type="text/css" rel="stylesheet">
    <script type="text/javascript">
        function doDel(id, product) {
            if (confirm("确定要删除吗？")) {
                window.location = 'data/action_metallurgy.php?action=del&id=' + id + '&product=' + product;
            }
        }
    </script>
</head>
<body>
<h1>工艺编辑系统(build)</h1>

<div><a href="../list_product.php">主页</a></div>

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
            'material',
        );
        $list = $db->get_choice_select(PRODUCT, $table_column, "id={$product_id}");
        $list['unit'] = null;
        if ($list == null) {
            echo "<script>
                    alert('没有相关数据！');
                    window.history.back();
                  </script>";
        } else {
            $content = key_value_change_one($list);
            $table = key_value($head, $content);
            key_value_table($table, 3);
        }
        ?>
    </table>
</div>
<h2>机加工工艺</h2>

<div><a href='../add/add_metallurgy.php?id=<?php echo $product_id; ?>'>添加</a></div>
<div>
    <table width="100%">
        <?php
        $material_num = $list['material_num'];
        $head = array(
            '序号',
            '工序名称',
            '工序内容',
            '准备时间',
            '运行时间',
            '版本号',
            '编辑'
        );
        simple_table($head);
        $list = $db->get_craft_select(METALLURGY, "material_num='{$material_num}'");
        if ($list != null) {
            foreach ($list as $row) {
                echo '<tr>';
                echo "<td>{$row['step_num']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['content']}</td>";
                echo "<td>{$row['prepare']}</td>";
                echo "<td>{$row['run']}</td>";
                echo "<td>{$row['version']}</td>";
                echo "<td>
                <a href='../edit/edit_metallurgy.php?id={$row['id']}&product={$product_id}'>修改</a>
                <a href='javascript:doDel({$row['id']},{$product_id})'>删除</a>
                 </td>";
                echo ' </tr > ';
            }
        }
        ?>
    </table>
</div>
<div><a href='../add/add_metallurgy.php?id=<?php echo $product_id; ?>'>添加</a></div>
</body>
</html>
