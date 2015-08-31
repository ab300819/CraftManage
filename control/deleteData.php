<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/27
 * Time: 22:39
 */
require_once 'connection.php';

$id = $_GET['id'];
$con = connect();
mysql_query("DELETE FROM testPHP WHERE id='$id'");
header("Location:show.php");

?>