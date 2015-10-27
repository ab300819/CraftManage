<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/19
 * Time: 13:28
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');

session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO($level);

$id = $_GET['id'];

$head = array(
    'craft_num',
    'material_num',
    'belong',
    'craft_type'
);


//$nuclear = array(
//    '机加工' => 'add_machine.php',
//    '铸造' => 'add_foundry.php',
//    '焊接' => 'add_welding.php',
//    '锻造' => 'add_forging.php',
//    '热处理' => 'add_heat.php',
//    '装配' => 'add_assembly.php',
//
//);

//$metallurgy = array(
//    '机加工' => 'add_metallurgy.php'
//);

$list = $db->get_choice_select(PRODUCT, $head, "id={$id}");
if ($list == null) {
    echo "<script>
            alert('没有相关产品！');
            window.history.back();
          </script>";
} else {
    jump($list, $id);
}

function jump($list, $id)
{
    if ($list['belong'] == '核电') {
        switch ($list['craft_type']) {
            case '机加工':
                echo "<script>window.location='../panel_machine.php?id='+{$id};</script>";
                break;
            case '铸造':
                echo "<script>window.location='../panel_foundry.php?id='+{$id};</script>";
                break;
            case '焊接':
                echo "<script>window.location='../panel_welding.php?id='+{$id};</script>";
                break;
            case '锻造':
                echo "<script>window.location='../panel_forging.php?id='+{$id};</script>";
                break;
            case '热处理':
                echo "<script>window.location='../panel_heat.php?id='+{$id};</script>";
                break;
            case '装配':
                echo "<script>window.location='../panel_assembly.php?id='+{$id};</script>";
                break;
        }
    } elseif ($list['belong'] == '冶金') {
        switch ($list['craft_type']) {
            case '机加工':
                echo "<script>window.location='../panel_metallurgy.php?id='+{$id};</script>";
                break;
        }

    }

}