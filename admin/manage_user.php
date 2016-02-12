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
            delete($db);
            break;
    }

}

function addUser($da)
{

}

function delUser($db)
{

}


?>