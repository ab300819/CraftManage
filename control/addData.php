<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/27
 * Time: 15:22
 */

require_once(dirname(__FILE__) . '/../data/config.php');
require_once(dirname(__FILE__) . '/../data/mysql.php');

if (isset($_POST['username'])) {
    $name = $_POST['username'];
} else {

    die("no user!");
}

if (isset($_POST['passwd'])) {
    $passwd = $_POST['passwd'];
} else {
    die("no password!");
}

$con = connect();
if ($con) {

    mysql_select_db('demo');
    mysql_query("INSERT INTO testPHP(username,passwd) VALUES ('$name','$passwd')");

} else {
    die('fail to connect db!');
}

header("Location:show.php");
