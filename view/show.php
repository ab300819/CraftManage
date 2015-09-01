<?php
require_once(dirname(__FILE__) . '/../data/mysql.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查询结果</title>
</head>
<body>
<a href="addData.html">添加用户</a>
<table width='100%' style='text-align: center' border='solid'>
    <tr>
        <th>工序号</th>
        <th>车间</th>
        <th>工序内容</th>
        <th>编辑</th>
        <th>删除</th>
    </tr>
    <?php
    $db = new \data\MysqlPDO(0);
    $sql = "SELECT * FROM testPHP";
    $list = $db->select($sql);

    foreach ($list as $row) {
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['passwd'] ?></td>
            <td><a href="edit.php?id=<?php echo $row['id'] ?>">修改</a></td>
            <td><a href="../control/deleteData.php?id=<?php echo $row['id'] ?>">删除</a></td>
        </tr>
    <?php }
    $db->free();
    ?>
</table>
</body>
</html>
