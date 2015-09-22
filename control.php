<?php
require_once('sql/mysql.php');
require_once('sql/operate.php');
$db = new \sql\MysqlPDO(0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>工艺管理</title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除吗？")) {
                window.location = 'data/action.php?action=del&id=' + id;
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
<?php include("edit_menu.php") ?>
<h2>零件信息</h2>

<p>操作：<a href="edit_product.php">修改</a>&nbsp;<a href="javascript:confirmDel(12)">删除</a></p>
<table width="100%" style="text-align: center" border="1">
    <?php
    $item = array('工艺编号：', '物料编码：', '生产批号：', '版本号：',
        '产品型号：', '物料名称：', '材料牌号：', '每台件数：',
        '产品名称：', '规格型号：', '毛坯种类：', '零件编号：',
        '工艺路线名称：', '零件标识：', '材料标识：', '热处理状态：');
    $list = $db->get_single_select_data(MACHINE, "id=1");
    $data = key_value_change_one($list);
    $table = key_value($item, $data);
    if ($table != null) {
        key_value_table($table, 4);
    }

    ?>
</table>
<h2>工艺内容</h2>
<table width='100%' style='text-align: center' border='1'>
    <tr>
        <th>工序号</th>
        <th>车间</th>
        <th>工序名称</th>
        <th>工序内容</th>
        <th>自检记录</th>
        <th>操作者</th>
        <th>专检记录</th>
        <th>检验员</th>
        <th>设备</th>
        <th>工艺设备</th>
        <th>准备时间</th>
        <th>运行时间</th>
        <th>版本号</th>
        <th>编辑</th>
    </tr>
    <?php
    $list = $db->get_all_select_data(MACHINE);
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
                    <a href='edit.php?id={$row['id']}'>修改</a>
                    <a href='javascript:doDel({$row['id']})'>删除</a>
                 </td>";
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>
