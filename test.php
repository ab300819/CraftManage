<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/31
 * Time: 15:51
 */

require_once 'mysql.php';
require_once 'user_config.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=demo', 'root', '110119');
} catch (PDOException $e) {
    die($e->getMessage());
}

//$sql = "INSERT INTO testPHP(username,passwd) VALUE ('MySQLPdo','12315')";
//$count = $db->insert($sql);
//echo $count . '<br>';

$sql = "SELECT * FROM testphp WHERE id=68";
$result=$pdo->query($sql);
$list=$result->fetch(PDO::FETCH_ASSOC);
print_r($list);

