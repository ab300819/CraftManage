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
<center>
    <?php include("menu.php") ?>
    <h3>工艺内容</h3>
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
        $db=new \data\MysqlPDO(0);
        $sql="SELECT * FROM craft_test";
        foreach($db->select($sql) as $row){
            echo '<tr>';
            echo "<td>{$row['cr_num']}</td>";
            echo "<td>{$row['cr_name']}</td>";
            echo "<td>{$row['cr_content']}</td>";
            echo "<td>{$row['cr_room']}</td>";
            echo "<td>{$row['cr_machine']}</td>";
            echo"<td>
                    <a href='edit.php?id={$row['id']}'>修改</a>
                    <a href='javascript:doDel({$row['id']})'>删除</a>
                 </td>";
            echo '</tr>';
        }
        ?>
    </table>
</center>
</body>
</html>
