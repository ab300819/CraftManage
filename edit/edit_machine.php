<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>工艺修改</title>
    <link rel="stylesheet" type="text/css" href="../res/css/common_table.css">
</head>
<body>
<?php
include("edit_menu.php");
$id = $_GET['id'];
$product = $_GET['product'];
$list = $db->get_select(MACHINE, "id='$id'");

?>
<h2>修改工艺</h2>

<form action="../data/action_machine.php?action=edit" method="post" id="machine" >
    <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
    <input type="hidden" name="product_id" value="<?php echo $product; ?>">
    <table align="center">
        <tr>
            <th>工艺编号</th>
            <td><input type="text" name="craft_num" value="<?php echo $list['craft_num']; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <th>物料编码</th>
            <td><input type="text" name="material_num" value="<?php echo $list['material_num']; ?>"></td>
        </tr>
        <tr>
            <th>工序号</th>
            <td><input type="text" name="step_num" value="<?php echo $list['step_num']; ?>"></td>
        </tr>
        <tr>
            <th>车间</th>
            <td><input type="text" name="room" value="<?php echo $list['room']; ?>"></td>
        </tr>
        <tr>
            <th>工序名称</th>
            <td><input type="text" name="name" value="<?php echo $list['name']; ?>"></td>
        </tr>
        <tr>
            <th>工序内容</th>
            <td><textarea rows="9" cols="90" name="content"
                          form="machine"><?php echo $list['content']; ?></textarea>
        </tr>
        <tr>
            <th>自检记录</th>
            <td><input type="text" name="self_check" value="<?php echo $list['self_check']; ?>"></td>
        </tr>
        <tr>
            <th>操作者</th>
            <td><input type="text" name="operator" value="<?php echo $list['operator']; ?>"></td>
        </tr>
        <tr>
            <th>专检记录</th>
            <td><input type="text" name="special_check" value="<?php echo $list['special_check']; ?>"></td>
        </tr>
        <tr>
            <th>检验员</th>
            <td><input type="text" name="checker" value="<?php echo $list['checker']; ?>"></td>
        </tr>
        <tr>
            <th>设备</th>
            <td><input type="text" name="machine" value="<?php echo $list['machine']; ?>"/</td>
        </tr>
        <tr>
            <th>工艺设备</th>
            <td><input type="text" name="craft_machine" value="<?php echo $list['craft_machine']; ?>"></td>
        </tr>
        <tr>
            <th>准备时间</th>
            <td><input type="text" name="prepare_time" value="<?php echo $list['prepare_time']; ?>"></td>
        </tr>
        <tr>
            <th>运行时间</th>
            <td><input type="text" name="run_time" value="<?php echo $list['run_time']; ?>"></td>
        </tr>
        <tr>
            <th>版本号</th>
            <td><input type="text" name="version" value="<?php echo $list['version']; ?>"></td>
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

