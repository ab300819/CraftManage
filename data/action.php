<?php

require_once(dirname(__FILE__) . '/../sql/mysql.php');

$db = new \data\MysqlPDO(0);

switch ($_GET['action']) {
    case 'add':

        $cr_num = $_POST['cr_num'];
        $cr_name = $_POST['cr_name'];
        $cr_content = $_POST['cr_content'];
        $cr_room = $_POST['cr_room'];
        $cr_machine = $_POST['cr_machine'];

        echo $cr_num;

        $sql = "INSERT INTO craft_test(cr_num,cr_name,cr_content,cr_room,cr_machine)
                          VALUES ('$cr_num','$cr_name','$cr_content','$cr_room','$cr_machine')";
        $rw = $db->action($sql);
        if ($rw > 0) {
            echo "<script>
                    alert('添加成功！');
                    window.location='../index.php';
                 </script>";
        } else {
            echo "<script>
                    alert('添加失败！');
                    window.history.back();
                 </script>";
        }
        break;

    case 'del':
        $id = $_GET['id'];
        $db->simpleDelete($id);
        header("Location:../index.php");
        break;

    case 'edit':
        $id = $_POST['id'];
        $cr_num = $_POST['cr_num'];
        $cr_name = $_POST['cr_name'];
        $cr_content = $_POST['cr_content'];
        $cr_room = $_POST['cr_room'];
        $cr_machine = $_POST['cr_machine'];

        $sql = "UPDATE craft_test SET cr_num='$cr_num',cr_name='$cr_name',cr_content='$cr_content',cr_room='$cr_room',cr_machine='$cr_machine' WHERE id='$id'";
        if ($db->action($sql) > 0) {
            echo "<script>
                    alert('更新成功！');
                    window.location='../index.php';
                 </script>";
        } else {
            echo "<script>
                    alert('更新失败！');
                    window.history.back();
                 </script>";
        }
        break;
}

?>