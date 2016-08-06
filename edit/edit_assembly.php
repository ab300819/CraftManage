<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/10
 * Time: 15:29
 * 装配
 */
require_once(dirname(__FILE__) . '/../sql/mysql.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>装配工艺编辑</title>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css"/>
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">

</head>
<body>
<?php
$id = $_GET['id'];
$data = $db->get_select(MACHINE, "id='$id'");
$list = $data[0];

?>
<div class="edit-panel">

    <div class="panel-head">
        <p>编辑核电装配工艺</p>
    </div>
    <div class="panel-content">

        <form action="../data/action_assembly.php?action=edit" method="post" id="assembly">
            <input type="hidden" name="id" value="">
            <table class="edit-list" align="center">
                <tr>
                    <th>工序</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>工序名称</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>工序要求</th>
                    <td>
                        <textarea name="" form="assembly"></textarea>

                    </td>
                </tr>
                <tr>
                    <th>自检记录</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>装配人员</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>检验记录</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>检验结论</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>检验员</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>见证</th>
                    <td><input type="text" name="" value=""></td>
                </tr>
                <tr>
                    <th>工艺装备</th>
                    <td><input type="text" name="" value=""></td>
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
