<?php

require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/table_config.php');

$db = new \sql\MysqlPDO(0);

switch ($_GET['action']) {
    case 'add':

//        $cr_num = $_POST['cr_num'];
//        $cr_name = $_POST['cr_name'];
//        $cr_content = $_POST['cr_content'];
//        $cr_room = $_POST['cr_room'];
//        $cr_machine = $_POST['cr_machine'];
//        $sql = "INSERT INTO craft_test(cr_num,cr_name,cr_content,cr_room,cr_machine)
//                          VALUES ('$cr_num','$cr_name','$cr_content','$cr_room','$cr_machine')";

        $data['cr_num'] = $_POST['cr_num'];
        $data['cr_name'] = $_POST['cr_name'];
        $data['cr_content'] = $_POST['cr_content'];
        $data['cr_room'] = $_POST['cr_room'];
        $data['cr_machine'] = $_POST['cr_machine'];
        $sql =$db->get_insert_db_sql(CRAFT_CONTENT,$data);

        $rw = $db->execute($sql);
        if ($rw > 0) {
            echo "<script>
                    alert('添加成功！');
                    window.location='../control.php';
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
        $db->get_delete_db_sql(CRAFT_CONTENT, "id='$id'");
        header("Location:../control.php");
        break;

    case 'edit':

//        $id = $_POST['id'];
//        $cr_num = $_POST['cr_num'];
//        $cr_name = $_POST['cr_name'];
//        $cr_content = $_POST['cr_content'];
//        $cr_room = $_POST['cr_room'];
//        $cr_machine = $_POST['cr_machine'];
//        $sql = "UPDATE craft_test SET cr_num='$cr_num',cr_name='$cr_name',cr_content='$cr_content',cr_room='$cr_room',cr_machine='$cr_machine' WHERE id='$id'";

        $id = $_POST['id'];
        $data['cr_num'] = $_POST['cr_num'];
        $data['cr_name'] = $_POST['cr_name'];
        $data['cr_content'] = $_POST['cr_content'];
        $data['cr_room'] = $_POST['cr_room'];
        $data['cr_machine'] = $_POST['cr_machine'];
        $sql = $db->get_update_db_sql(CRAFT_CONTENT, $data, "id='$id'");

        if ($db->execute($sql) > 0) {
            echo "<script>
                    alert('更新成功！');
                    window.location='../control.php';
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