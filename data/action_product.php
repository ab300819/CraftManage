<?php
/**
 * 产品信息
 */

require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO($level);

function add($db)
{
    $table_1 = array(
        'material_num',
        'material_name',
        'name',
        'model',
        'standard',
        'component_discern',
        'component_num',
        'craft_line',
        'produce_model',
        'craft_num',
        'produce_num',
        'type',
        'craft_type'
    );
    $data=[];
    foreach ($table_1 as $head){
        $data[$head]=$_POST[$head];
    }

    $table_2=array(
        'material_num',
        'material',
        'material_discern',
        'blank',
        'per_num',
        'heat'
    );

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

