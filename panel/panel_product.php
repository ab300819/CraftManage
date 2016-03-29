<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
require_once(dirname(__FILE__) . '/../sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>产品信息</title>
    <link href="../res/css/list.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include("edit_menu.php") ?>
<h2>添加产品</h2>

<form action="../data/action_product.php?action=add" method="post">
    <table width="100%">
        <tr>
            <th>*工艺编号</th>
            <td><input type="text" name="craft_num" required="required"></td>
            <th>*物料编码</th>
            <td><input type="text" name="material_num" required="required"></td>
            <th>生成批号</th>
            <td><input type="text" name="produce_num"></td>
            <th>*版本号</th>
            <td><input type="text" name="version" required="required"></td>
        </tr>
        <tr>
            <th>生产型号</th>
            <td><input type="text" name="produce_model"></td>
            <th>*物料名称</th>
            <td><input type="text" name="material_name" required="required"></td>
            <th>*材料牌号</th>
            <td><input type="text" name="material_model" required="required"></td>
            <th>*每台件数</th>
            <td><input type="text" name="per_num" required="required"></td>
        </tr>
        <tr>
            <th>*产品名称</th>
            <td><input type="text" name="name" required="required"></td>
            <th>*规格型号</th>
            <td><input type="text" name="standard" required="required"></td>
            <th>*毛坯种类</th>
            <td><input type="text" name="blank" required="required"></td>
            <th>*零件编号</th>
            <td><input type="text" name="component_num" required="required"></td>
        </tr>
        <tr>
            <th>*工艺路线名称</th>
            <td><input type="text" name="craft_line" required="required"></td>
            <th>零件标识</th>
            <td><input type="text" name="component_discern"></td>
            <th>材料标识</th>
            <td><input type="text" name="material_discern"></td>
            <th>*热处理状态</th>
            <td><input type="text" name="heat" required="required"></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="提交"/>
        <input type="reset" value="重置">
    </div>
</form>
</body>
</html>