<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
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
    $db = new \data\MysqlPDO(0);
    $list = $db->simpleSelect($_GET['id']);
    ?>
    <h3>修改工艺</h3>

    <form action="action.php?action=edit" method="post">
        <input type="hidden" name="'id" value="<?php echo $list['id']; ?>"/>
        <table>
            <tr>
                <td>工序号</td>
                <td><input type="text" name="cr_num" value=""/></td>
            </tr>
            <tr>
                <td>工序名称</td>
                <td><input type="text" name="cr_name" value=""/></td>
            </tr>
            <tr>
                <td>工序内容</td>
                <td><input type="text" name="cr_content" value=""></td>
            </tr>
            <tr>
                <td>车间</td>
                <td><input type="text" name="cr_room" value=""></td>
            </tr>
            <tr>
                <td>设备</td>
                <td><input type="text" name="cr_machine" value=""></td>
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

