<?php
/**
 * 机加工
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');

session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];

$db = new \sql\MysqlPDO($level);

/**
 * @param $db
 */
function add($db)
{
    $product_id = $_POST['product_id'];
    $table = array(
        'craft_num',
        'material_num',
        'step_num',
        'room',
        'name',
        'content',
        'self_check',
        'operator',
        'special_check',
        'checker',
        'machine',
        'craft_machine',
        'prepare_time',
        'run_time',
        'version'
    );
    $data = array();
    foreach ($table as $head) {
        $data[$head] = $_POST[$head];
    }


    $sql = $db->insert_data(MACHINE, $data);
    $rw = $db->execute($sql);
    if ($rw > 0) {
        echo "<script>
                    alert('添加成功！');
                    window.location='../panel_machine.php?id='+'{$product_id}';
                 </script>";
    } else {
        echo "<script>
                    alert('添加失败！');
                    window.history.back();
                 </script>";
    }
}

/**
 * @param $db
 */
function delete($db)
{
    $id = $_GET['id'];
    $product_id = $_GET['product'];
    $db->delete_data(MACHINE, "id={$id}");
    header("Location:../panel_machine.php?id={$product_id}");
}

/**
 * @param $db
 */
function edit($db)
{
    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $data['craft_num'] = $_POST['craft_num'];
    $data['material_num'] = $_POST['material_num'];
    $data['step_num'] = $_POST['step_num'];
    $data['room'] = $_POST['room'];
    $data['name'] = $_POST['name'];
    $data['content'] = $_POST['content'];
    $data['self_check'] = $_POST['self_check'];
    $data['operator'] = $_POST['operator'];
    $data['special_check'] = $_POST['special_check'];
    $data['checker'] = $_POST['checker'];
    $data['machine'] = $_POST['machine'];
    $data['craft_machine'] = $_POST['craft_machine'];
    $data['prepare_time'] = $_POST['prepare_time'];
    $data['run_time'] = $_POST['run_time'];
    $data['version'] = $_POST['version'];
    $sql = $db->update_data(MACHINE, $data, "id={$id}");
    if ($db->execute($sql) > 0) {
        echo "<script>
                    alert('更新成功！');
                    window.location='../panel_machine.php?id={$product_id}';
                 </script>";
    } else {
        echo "<script>
                    alert('更新失败！');
                    window.history.back();
                 </script>";
    }
}

switch ($_GET['action']) {
    case 'add':
        add($db);
        break;

    case 'del':
        delete($db);
        break;

    case 'edit':
        edit($db);
        break;
}

?>