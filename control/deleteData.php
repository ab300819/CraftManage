<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/27
 * Time: 22:39
 */
require_once(dirname(__FILE__) . '/../data/mysql.php');

if ($_GET['id'] != '') {
    $id = $_GET['id'];
    $db = new \data\MysqlPDO(0);
    $db->simpleDelete($id);
    $db->free();

    header("Location:../view/show.php");

} else {
    echo '无对应数据！' . '<br>';
}

?>