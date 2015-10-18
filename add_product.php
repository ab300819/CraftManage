<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>产品信息</title>
</head>
<link href="./res/css/style.css" rel="stylesheet" type="text/css">
<body>
<?php include("edit_menu.php");
$material_num = $_POST['material_num'];
$name = $_POST['name'];
$model = $_POST['model'];
?>
<h2>添加产品</h2>

<form action="data/action_product.php?action=add" method="post">
    <table width="100%">
        <tr>
            <th>*工艺编号</th>
            <td><input type="text" name="craft_num" required="required"></td>
            <th>物料编码</th>
            <td><input type="text" name="material_num" value="<?php echo $material_num; ?>" readonly="readonly"></td>
            <th>生成批号</th>
            <td><input type="text" name="produce_num"></td>
            <th>型号</th>
            <td><input type="text" name="version" value="<?php echo $model; ?>" readonly="readonly"></td>
        </tr>
        <tr>
            <th>生产型号</th>
            <td><input type="text" name="produce_model"></td>
            <th>*物料名称</th>
            <td><input type="text" name="material_name" required="required"></td>
            <th>*材料牌号</th>
            <td><input type="text" name="material" required="required"></td>
            <th>*每台件数</th>
            <td><input type="text" name="per_num" required="required"></td>
        </tr>
        <tr>
            <th>*产品名称</th>
            <td><input type="text" name="name" value="<?php echo $name; ?>" readonly="readonly"></td>
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