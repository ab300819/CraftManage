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
    $table = array(
        'material_num',
        'material_name',
        'name',
        'model',
        'num',
        'standard',
        'component_discern',
        'component_num',
        'component_draw',
        'assemble_draw',
        'craft_line',
        'produce_model',
        'craft_num',
        'produce_num',
        'material',
        'material_discern',
        'blank',
        'per_num',
        'heat',
        'belong',
        'craft_type'
    );
    $data = [];
    foreach ($table as $head) {
        $data[$head] = $_POST[$head];
    }
    $sql = $db->insert_data(PRODUCT, $data);
    $rw = $db->execute($sql);
    echo $sql;
    if ($rw > 0) {
        echo "<script>
                    alert('添加成功！');
                    window.location='../list_product.php';
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
    $table = array(
        'material_num',
        'material_name',
        'name',
        'model',
        'num',
        'standard',
        'component_discern',
        'component_num',
        'component_draw',
        'assemble_draw',
        'craft_line',
        'produce_model',
        'craft_num',
        'produce_num',
        'material',
        'material_discern',
        'blank',
        'per_num',
        'heat',
        'belong',
        'craft_type'
    );
    $data = [];
    foreach ($table as $head) {
        $data[$head] = $_POST[$head];
    }
    $sql = $db->update_data(PRODUCT, $data, "material_num='{$data['material_num']}'");
    if ($db->execute($sql) > 0) {
        echo "<script>
                    alert('更新成功！');
                    window.location='../list_product.php';
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

