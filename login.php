<?php
require_once('sql/mysql.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {

    $db = new \sql\MysqlPDO(0);
    $list = $db->get_single_select_data(USER, "username='$username'");

    if ($list['password'] != $password) {
        echo "<script>
                  alert('密码错误！');
                  window.location='index.html';
          </script>";
    } elseif ($list['level'] == 0) {
        header("Location:control.php");
    } else {
        header("Location:select.php");
    }


} else {
    echo "<script>
                  alert('用户名或密码不为空！');
                  window.location='index.html';
          </script>";
}

?>