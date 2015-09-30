<?php
/**
 * 产品信息
 */

require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db=new \sql\MysqlPDO($level);

function add($db){

}

switch($_GET['action']){
    case 'add':

        break;
    case 'edit':

        break;

    case 'del':

        break;
}

?>

