<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/27
 * Time: 16:37
 */

require_once(dirname(__FILE__) . '/../data/config.php');
require_once(dirname(__FILE__) . '/../data/mysql.php');

if ($_POST['id'] != '') {
    $id = $_POST['id'];
} else {
    die('No id!' . '<br>');
}
if ($_POST['username'] != '') {
    $username = $_POST['username'];
} else {
    die('No name!' . '<br>');
}
if ($_POST['passwd'] != '') {
    $passwd = $_POST['passwd'];

} else {
    die('No password!' . '<br>');
}

$db = new \data\MysqlPDO(MYSQL_LOCAL, MYSQL_USER, MYSQL_pw, 'demo');
$sql = "UPDATE testPHP SET username='$username',passwd='$passwd' WHERE id='$id'";
$db->updateAll($sql);
$db->free();

header("Location:show.php");
