<?php
require_once('sql/mysql.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>工艺修改</title>
</head>
<link rel="stylesheet" type="text/css" href="res/css/style.css">
<body>
<?php
include("edit_menu.php");
$id = $_GET['id'];
$db = new \sql\MysqlPDO(0);
$list = $db->get_single_select_data(CRAFT_CONTENT, "id='$id'");
?>
<h2>修改工艺</h2>

<form action="./data/action.php?action=edit" method="post" id="craft">
    <input type="hidden" name="id" value="<?php echo $list['id']; ?>"/>
    <table>
        <tr>
            <th>工序号</th>
            <td><input type="text" name="cr_num" value="<?php echo $list['cr_num']; ?>" readonly="true"/></td>
        </tr>
        <tr>
            <th>工序名称</th>
            <td><input type="text" name="cr_name" value="<?php echo $list['cr_name']; ?>"/></td>
        </tr>
        <tr>
            <th>工序内容</th>
            <td><textarea rows="4" cols="50" name="cr_content"
                          form="craft"><?php echo $list['cr_content']; ?></textarea>
            </td>
        </tr>
        <tr>
            <th>车间</th>
            <td><input type="text" name="cr_room" value="<?php echo $list['cr_room']; ?>"></td>
        </tr>
        <tr>
            <th>设备</th>
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
</body>
</html>

