<?php
/**
 * Created by PhpStorm.
 * User: Paradise
 * Date: 2016/3/24
 * Time: 16:36
 */
require_once('sql/mysql.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO();

$head = array(
    'id',
    'material_num',
    'craft_num',
    'name',
    'model',
    'belong',
    'craft_type'
);

$title = array(
    'id',
    '物料代码',
    '工艺代码',
    '名称',
    '模型',
    '类别',
    '工艺类型'
);

$result = $db->select($head, PRODUCT);

$table = "<tr>";
foreach ($title as $cell) {
    $table = $table . "<th>{$cell}</th>";
}
$table = $table . "</tr>";

foreach ($result as $line) {
    $table = $table . "<tr>";
    foreach ($line as $key => $value) {
        $table = $table . "<td>$value</td>";
    }
    $table = $table . "</tr>";
}

echo $table;




