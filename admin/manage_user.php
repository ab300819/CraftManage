<?php
/**
 * Created by PhpStorm.
 * User: Paradise
 * Date: 2016/2/12
 * Time: 20:14
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
if ($user != 'admin') {
    echo "<script>
    confirm('你又不是管理员！');
    window.location='../index.html';
          </script>";
} else {
    $db = new \sql\MysqlPDO($level);
    switch ($_GET['action']) {
        case 'add':
            addUser($db);
            break;
        case 'del':
            deluser($db);
            break;
    }

}

function addUser($db)
{
    $username = $_POST['username'];
    $table['username'] = $username;
    $table['password'] = $_POST['password'];
    $table['level'] = $_POST['level'];

    $result = $db->get_select(USER, "username='{$username}'");
    if ($result == null) {
        $sql = $db->insert_data(USER, $table);
    } elseif ($result['username'] == 'admin') {
        $table['level'] = 0;
        $sql = $db->updateData(USER, $table, "id={$result['id']}");
    } else {
        $sql = $db->updateData(USER, $table, "id={$result['id']}");
    }

    $rw = $db->execute($sql);

    if ($rw > 0) {
        echo "<script>
                alert('添加成功！');
                window.location='../admin/manage_panel.php';
              </script>";
    } else {
        echo "<script>
                alert('添加失败！');
                window.location='../admin/manage_panel.php';
              </script>";
    }

}

function delUser($db)
{
    $id = $_GET['id'];
    $user = $db->get_select(USER, "id={$id}");
    if ($user['username'] == 'admin') {
        echo "<script>
                confirm('管理员账户不可删除！');
                window.location='../admin/manage_panel.php';
              </script>";
    } else {
        $db->delData(USER, "id={$id}");
        echo "<script>
                alert('账户删除成功！');
                window.location='../admin/manage_panel.php';
              </script>";
    }
}


?>