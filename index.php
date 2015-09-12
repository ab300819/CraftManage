<?php
require_once('sql/mysql.php');
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
</head>
<body>
<?php include("menu.php") ?>
<h2>零件信息</h2>
<p>操作：<a href="editProduct.php">修改</a></p>
<table width="100%" style="text-align: center" border="1">
    <tr>
        <th>工艺编号</th>
        <td>&nbsp;</td>
        <th>物料编码</th>
        <td>&nbsp;</td>
        <th>生成批号</th>
        <td>&nbsp;</td>
        <th>版本号</th>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th>生产型号</th>
        <td>&nbsp;</td>
        <th>物料名称</th>
        <td>&nbsp;</td>
        <th>材料牌号</th>
        <td>&nbsp;</td>
        <th>每台件数</th>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th>产品名称</th>
        <td>&nbsp;</td>
        <th>规格型号</th>
        <td>&nbsp;</td>
        <th>毛坯种类</th>
        <td>&nbsp;</td>
        <th>零件编号</th>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <th>工艺路线名称</th>
        <td>&nbsp;</td>
        <th>零件标识</th>
        <td>&nbsp;</td>
        <th>材料标识</th>
        <td>&nbsp;</td>
        <th>热处理状态</th>
        <td>&nbsp;</td>
    </tr>
</table>
<h2>工艺内容</h2>
<table width='100%' style='text-align: center' border='1'>
    <tr>
        <th>工序号</th>
        <th>工序名称</th>
        <th>工序内容</th>
        <th>车间</th>
        <th>设备</th>
        <th>操作</th>
    </tr>
    <?php
    $db = new \sql\MysqlPDO(0);
    //        $sql="SELECT * FROM craft_test";

    foreach ($db->get_all_select_data(CRAFT_CONTENT) as $row) {
        echo '<tr>';
        echo "<td>{$row['cr_num']}</td>";
        echo "<td>{$row['cr_name']}</td>";
        echo "<td>{$row['cr_content']}</td>";
        echo "<td>{$row['cr_room']}</td>";
        echo "<td>{$row['cr_machine']}</td>";
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
