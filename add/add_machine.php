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
//TODO 实际调用取消注释
$data = $db->get_choice_select(PRODUCT, $info, "id={$product_id}");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>添加机加工工艺</title>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css"/>
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">
</head>
<body>
<div class="edit-panel">
    <div class="panel-head">
        <p>添加机加工工艺</p>
    </div>
    <div class="panel-content">
        <form action="../data/action_machine.php?action=add" method="post" id="machine">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="hidden" name="material_num" value="<?php echo $data['material_num']; ?>">
            <input type="hidden" name="craft_num" value="<?php echo $data['craft_num']; ?>">
            <table class="edit-list" align="center">
                <tr>
                    <th>工序号</th>
                    <td><input type="number" placeholder="工序号为数字" min="5" name="step_num"/></td>
                </tr>
                <tr>
                    <th>车间</th>
                    <td><input type="text" name="room"/></td>
                </tr>
                <tr>
                    <th>工序名称</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>工序内容</th>
                    <td><textarea rows="9" cols="90" name="content" form="machine"></textarea></td>
                </tr>
                <tr>
                    <th>自检记录</th>
                    <td><input type="text" name="self_check"/></td>
                </tr>
                <tr>
                    <th>操作者</th>
                    <td><input type="text" name="operator"></td>
                </tr>
                <tr>
                    <th>专检记录</th>
                    <td><input type="text" name="special_check"></td>
                </tr>
                <tr>
                    <th>检验员</th>
                    <td><input type="text" name="checker"></td>
                </tr>
                <tr>
                    <th>设备</th>
                    <td><input type="text" name="machine"/></td>
                </tr>
                <tr>
                    <th>工艺设备</th>
                    <td><input type="text" name="craft_machine"/></td>
                </tr>
                <tr>
                    <th>准备时间</th>
                    <td><input type="text" name="prepare_time"/></td>
                </tr>
                <tr>
                    <th>运行时间</th>
                    <td><input type="text" name="run_time"/></td>
                </tr>
                <tr>
                    <th>版本号</th>
                    <td><input type="number" placeholder="版本号为数字" min="1" name="version"/></td>
                </tr>
            </table>
            <div class="edit-button">
                <input class="ui-button ui-widget ui-corner-all" type="submit" value="提交"/>
                <input class="ui-button ui-widget ui-corner-all" type="reset" value="重置"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>