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

<form action="data/action_product.php?action=add" method="post" id="product">
    <table width="100%">
        <tr>
            <th>物料编码</th>
            <td>
                <input type="text" name="material_num" value="<?php echo $material_num; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <th>物料名称</th>
            <td>
                <input type="text" name="material_name">
            </td>
        </tr>
        <tr>
            <th>产品名称</th>
            <td>
                <input type="text" name="name" value="<?php echo $name; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <th>产品型号</th>
            <td>
                <input type="text" name="model" value="<?php echo $model; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <th>产品编号</th>
            <td>
                <input type="text" name="num">
            </td>
        </tr>
        <tr>
            <th>规格型号</th>
            <td>
                <input type="text" name="standard">
            </td>
        </tr>
        <tr>
            <th>零件标识</th>
            <td>
                <input type="text" name="component_discern">

            </td>
        </tr>
        <tr>
            <th>零件编号</th>
            <td>
                <input type="text" name="component_num">
            </td>
        </tr>
        <tr>
            <th>零件图号</th>
            <td>
                <input type="text" name="component_draw">
            </td>
        </tr>
        <tr>
            <th>装配图号</th>
            <td>
                <input type="text" name="assemble_draw">
            </td>
        </tr>
        <tr>
            <th>工艺路线名称</th>
            <td>
                <input type="text" name="craft_line">
            </td>
        </tr>
        <tr>
            <th>生产型号</th>
            <td>
                <input type="text" name="produce_model">
            </td>
        </tr>
        <tr>
            <th>工艺编号</th>
            <td>
                <input type="text" name="craft_num">
            </td>
        </tr>
        <tr>
            <th>生产批号</th>
            <td>
                <input type="text" name="produce_num">
            </td>
        </tr>
        <tr>
            <th>材料牌号</th>
            <td>
                <input type="text" name="material">
            </td>
        </tr>
        <tr>
            <th>材料标识</th>
            <td>
                <input type="text" name="material_discern">
            </td>
        </tr>
        <tr>
            <th>毛坯种类</th>
            <td>
                <input type="text" name="blank">
            </td>
        </tr>
        <tr>
            <th>每台件数</th>
            <td>
                <input type="text" name="per_num">
            </td>
        </tr>
        <tr>
            <th>热处理状态</th>
            <td>
                <input type="text" name="heat">
            </td>
        </tr>
        <tr>
            <th>产品类别</th>
            <td>
                <select name="belong" form="product" required="required">
                    <option value="核电">核电</option>
                    <option value="冶金">冶金</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>工艺类型</th>
            <td>
                <select name="craft_type" form="product" required="required">
                    <option value="机加工">机加工</option>
                    <option value="铸造">铸造</option>
                    <option value="焊接">焊接</option>
                    <option value="锻造">锻造</option>
                    <option value="热处理">热处理</option>
                    <option value="装配">装配</option>
                </select>
            </td>

        </tr>
    </table>
    <input type="submit" value="提交"/>
    <input type="reset" value="重置">
</form>
</body>
</html>