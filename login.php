<?php
require_once('sql/mysql.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {

    $db = new \sql\MysqlPDO(0);
    $list = $db->get_select(USER, "username='$username'");

    if ($list['password'] != $password) {
        echo "<script>
                  alert('密码错误！');
                  window.location='index.html';
          </script>";
    } elseif ($list['level'] == 3) {
        $_SESSION[$username] = $list['level'];
        $_SESSION['user'] = $list['username'];
        header("Location:select.php");

    }elseif($username=='admin'){
        echo "<script>window.location='admin/manage_panel.php'</script>";
    }
    else {
        $_SESSION[$username] = $list['level'];
        $_SESSION['user'] = $list['username'];
        header("Location:list_product.php");
    }


} else {
    echo "<script>
                  alert('用户名或密码不为空！');
                  window.location='index.html';
          </script>";
}

?>