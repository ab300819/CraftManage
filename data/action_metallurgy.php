<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/10
 * Time: 13:14
 * 冶金
 */

require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');

session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO($level);

function add($db)
{
    $product_id = $_POST['product_id'];
    $table = array(
        'material_num',
        'craft_num',
        'step_num',
        'name',
        'content',
        'prepare',
        'run',
        'version'
    );
    $data = array();
    foreach ($table as $head) {
        $data[$head] = $_POST[$head];
    }
    $sql = $db->insert_data(METALLURGY, $data);
    $rw = $db->execute($sql);
    if ($rw > 0) {
        echo "<script>
                    alert('添加成功！');
                    window.location='../panel/panel_metallurgy.php?id='+'{$product_id}';
                 </script>";
    } else {
        echo "<script>
                    alert('添加失败！');
                    window.history.back();
                 </script>";
    }
}

function edit($db)
{
    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $table = array(
        'step_num',
        'name',
        'content',
        'prepare',
        'run',
        'version'
    );
    $data = array();
    foreach ($table as $head) {
        $data[$head] = $_POST[$head];
    }
    $sql = $db->update_data(METALLURGY, $data, "id='$id'");

    if ($db->execute($sql) > 0) {
        echo "<script>
                    alert('更新成功！');
                    window.location='../panel/panel_metallurgy.php?id='+'{$product_id}';
                 </script>";
    } else {
        echo "<script>
                    alert('更新失败！');
                    window.history.back();
                 </script>";
    }
}

function del($db)
{
    $id = $_GET['id'];
    $product_id = $_GET['product'];
    $db->delete_data(METALLURGY, "id='$id'");
    header("Location:../panel/panel_metallurgy.php?id={$product_id}");
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