<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/31
 * Time: 15:51
 */

require_once 'mysql.php';
require_once 'config.php';

$db = new \data\MysqlPDO(MYSQL_LOCAL, MYSQL_USER, MYSQL_pw, 'demo');
$db->init();
$sql = "INSERT INTO testPHP(username,passwd) VALUE ('MySQLPdo','12315')";
$count = $db->insertAll($sql);
echo $count . '<br>';
$db->free();

