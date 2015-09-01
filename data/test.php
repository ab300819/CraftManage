<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/31
 * Time: 15:51
 */

require_once 'mysql.php';
require_once 'config.php';

$db = new \data\MysqlPDO(0);
$sql = "INSERT INTO testPHP(username,passwd) VALUE ('MySQLPdo','12315')";
$count = $db->insert($sql);
echo $count . '<br>';

$sql = "SELECT * FROM testphp WHERE id=68";
$list=$db->select($sql);
print_r($list);

