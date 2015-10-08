<?php
/**
 * 产品信息
 */

require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO(0);

function add($db)
{
    $table = array(
        'craft_num',
        'material_num',
        'produce_num',
        'version',
        'produce_model',
        'material_name',
        'material_model',
        'per_num',
        'standard',
        'blank',
        'component_num',
        'craft_line',
        'component_discern',
       'material_discern',
        'heat'
    );
    $data=array();

    foreach ($table as $head){
        $data[$head]=$_POST[$head];
    }


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

