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
<html>
<head>
    <meta charset="UTF-8">
    <title>装配工艺编辑</title>
    <link rel="stylesheet" type="text/css" href="../res/css/common_table.css">
</head>
<body>
<?php
$id = $_GET['id'];
$data = $db->get_select(MACHINE, "id='$id'");
$list = $data[0];

?>
<h2>修改工艺</h2>

<form action="../data/action_assembly.php?action=edit" method="post" id="assembly">
    <input type="hidden" name="id" value="">
    <table align="center">
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
                <textarea rows="9" cols="90" name="" form="assembly"></textarea>

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
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>
                <input type="submit" value="提交">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</body>
</html>
