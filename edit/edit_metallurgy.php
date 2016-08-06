<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/10
 * Time: 15:41
 * 冶金
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css">
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">
</head>
<body>
<?php
include("edit_menu.php");
$id = $_GET['id'];
$product = $_GET['product'];
$list = $db->get_select(METALLURGY, "id='$id'");
?>
<div class="edit-panel">
    <div class="panel-head">
        <p>编辑冶金机加工工艺</p>
    </div>
    <div class="panel-content">

        <form action="data/action_metallurgy.php?action=edit" method="post" id="metallurgy">
            <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
            <input type="hidden" name="product_id" value="<?php echo $product; ?>">

            <table class="edit-list" align="center">
                <tr>
                    <th>序号</th>
                    <td><input type="text" required="required" name="step_num" value="<?php echo $list['step_num']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>工序名称</th>
                    <td><input type="text" required="required" name="name" value="<?php echo $list['name']; ?>"></td>
                </tr>
                <tr>
                    <th>工序内容</th>
                    <td><textarea rows="9" cols="90" name="content"
                                  form="metallurgy"><?php echo $list['content']; ?></textarea>
                    </td>

                </tr>
                <tr>
                    <th>准备时间</th>
                    <td><input type="text" required="required" name="prepare" value="<?php echo $list['prepare']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>运行时间</th>
                    <td><input type="text" required="required" name="run" value="<?php echo $list['run']; ?>"></td>
                </tr>
                <tr>
                    <th>版本号</th>
                    <td><input type="text" name="version" required="required" value="<?php echo $list['version']; ?>">
                    </td>
                </tr>
            </table>
            <div class="edit-button">
                <input class="ui-button ui-widget ui-corner-all" type="submit" value="提交">
                <input class="ui-button ui-widget ui-corner-all" type="reset" value="重置">
            </div>
        </form>
    </div>

</div>

</body>
</html>
