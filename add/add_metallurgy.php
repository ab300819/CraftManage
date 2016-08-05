<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
$product_id = $_GET['id'];
$info = array(
    'material_num',
    'craft_num'
);
$data = $db->get_choice_select(PRODUCT, $info, "id={$product_id}");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../res/css/custom/list.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php //include("edit_menu.php"); ?>
<form action="../data/action_metallurgy.php?action=add" method="post" id="metallurgy">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type="hidden" name="material_num" value="<?php echo $data['material_num']; ?>">
    <input type="hidden" name="craft_num" value="<?php echo $data['craft_num']; ?>">
    <table align="center">
        <tr>
            <th>序号：</th>
            <td><input type="text" required="required" name="step_num"></td>
        </tr>
        <tr>
            <th>工序名称：</th>
            <td><input type="text" required="required" name="name"></td>
        </tr>
        <tr>
            <th>工序内容：</th>
            <td><textarea rows="9" cols="90" name="content" form="metallurgy"></textarea></td>

        </tr>
        <tr>
            <th>准备时间：</th>
            <td><input type="text" required="required" name="prepare"></td>
        </tr>
        <tr>
            <th>运行时间：</th>
            <td><input type="text" required="required" name="run"></td>
        </tr>
        <tr>
            <th>版本：</th>
            <td><input type="text" required="required" name="version"></td>
        </tr>
    </table>
    <p></p>
    <input type="submit" value="提交">
    <input type="reset" value="重置">
</form>
</body>
</html>