<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/27
 * Time: 15:22
 */

require_once(dirname(__FILE__) . '/../data/mysql.php');

if ($_POST['username'] != '') {
    $name = $_POST['username'];
} else {
    die("no user!");
}

if ($_POST['passwd'] != '') {
    $passwd = $_POST['passwd'];
} else {
    die("no password!");
}

$db=new \data\MysqlPDO(0);
$sql="INSERT INTO testPHP(username,passwd) VALUES ('$name','$passwd')";
$db->insert($sql);
$db->free();

header("Location:../view/show.php");
