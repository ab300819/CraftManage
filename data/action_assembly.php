<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/9/24
 * Time: 20:38
 * 装配
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');

session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO($level);

function add($db)
{

}

function edit($db)
{

}

function del($db)
{

}

switch ($_GET['action']) {
    case 'add':
        add($db);
        break;
    case 'edit':
        edit($db);
        break;
    case 'del':
        del($db);
        break;
}

?>