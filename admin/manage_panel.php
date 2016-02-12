<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
if ($user != 'admin') {
    echo "<script>
    confirm('你不是管理员！');
    window.location='../index.html';
          </script>";
} else {
    $db = new \sql\MysqlPDO($level);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>账号管理</title>
    <link href="../res/css/style.css" rel="stylesheet" type="text/css">
    <script type="javascript">
        function delUser(id) {
            if (confirm("确定删除此用户？")) {
                window.location = 'delete_user.php?action=del&id=' + id;
            }
        }
    </script>
</head>
<body>

<h1>工艺管理系统账户管理</h1>
<nav>
    <a href="">退出</a>
</nav>
<div align="center">
    <form action="manage_user.php?action=add" method="post" id="user">
        <table align="center">
            <tr>
                <th>工号</th>
                <th>密码</th>
                <th>级别</th>
                <th>操作</th>
            </tr>
            <tr>
                <?php
                $key = array(
                    'id',
                    'username',
                    'password',
                    'level'
                );

                $data = $db->get_choice_select(USER, $key);
                if ($data == null) {
                    echo '没有账户！';
                } else {
                    $list = two_key_value($key, $data);
                    foreach ($list as $cell) {
                        foreach ($cell as $name => $value) {
                            if ($name != 'id') {
                                echo "<td>{$value}</td>";
                            }
                        }
                        echo "<td><a href='javascript:delUser({$cell['id']});'>删除</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            <tr>
                <td><input type="text" name="username" required="required"></td>
                <td><input type="password" name="password" required="required"></td>
                <td>
                    <select name="level" form="user">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" selected="selected">3</option>
                    </select>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <input type="submit" value="提交">
        <input type="reset" value="重置">
    </form>
</div>

</body>
</html>