<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/9/24
 * Time: 20:37
 * 锻造工艺
 */

require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');

session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO($level);

?>