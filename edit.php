<?php
require_once('sql/mysql.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>工艺修改</title>
</head>
<body>
<center>
    <?php
    include("menu.php");
    $id = $_GET['id'];
    $db = new \sql\MysqlPDO(0);
    $list = $db->get_single_select_data(CRAFT_CONTENT, "id='$id'");
    ?>
    <h3>修改工艺</h3>

    <form action="./data/action.php?action=edit" method="post">
        <input type="hidden" name="id" value="<?php echo $list['id']; ?>"/>
        <table>
            <tr>
                <td>工序号</td>
                <td><input type="text" name="cr_num" value="<?php echo $list['cr_num']; ?>"/></td>
            </tr>
            <tr>
                <td>工序名称</td>
                <td><input type="text" name="cr_name" value="<?php echo $list['cr_name']; ?>"/></td>
            </tr>
            <tr>
                <td>工序内容</td>
                <td><input type="text" name="cr_content" value="<?php echo $list['cr_content']; ?>"></td>
            </tr>
            <tr>
                <td>车间</td>
                <td><input type="text" name="cr_room" value="<?php echo $list['cr_room']; ?>"></td>
            </tr>
            <tr>
                <td>设备</td>
                <td><input type="text" name="cr_machine" value="<?php echo $list['cr_machine']; ?>"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="提交">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>

