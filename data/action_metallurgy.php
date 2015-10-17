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

//TODO 测试完改回$level
$db = new \sql\MysqlPDO(0);

function add($db)
{
    $table=array(
        'step_num',
        'name',
        'content',
        'prepare',
        'run',
        'version'
        );
    $data=array();
    foreach($table as $head){
        $data[$head]=$_POST[$head];
    }
    $sql = $db->insert_data(METALLURGY, $data);
    $rw = $db->execute($sql);
    if ($rw > 0) {
        echo "<script>
                    alert('添加成功！');
                    window.location='../panel_metallurgy.php';
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
    $id=$_POST['id'];
    $table=array(
        'step_num',
        'name',
        'content',
        'prepare',
        'run',
        'version'
    );
    $data=array();
    foreach($table as $head){
        $data[$head]=$_POST[$head];
    }
    $sql = $db->update_data(METALLURGY, $data, "id='$id'");

    if ($db->execute($sql) > 0) {
        echo "<script>
                    alert('更新成功！');
                    window.location='../panel_machine.php';
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
    $db->delete_data(METALLURGY, "id='$id'");
    header("Location:../panel_machine.php");
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