<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>产品信息</title>
</head>
<link href="../res/css/style.css" rel="stylesheet" type="text/css">
<body>
<?php

//include("edit_menu.php");
$material_num = $_POST['material_num'];
$craft_num = $_POST['craft_num'];

?>
<h2>添加产品</h2>

<form action="../data/action_product.php?action=add" method="post" id="product">
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
<!--                <input type="text" name="name">-->
                <input type="text" list="name" name="name">
                <datalist id="name">
                    <option value="阀芯">阀芯</option>
                    <option value="阀座">阀座</option>
                    <option value="阀体">阀体</option>
                    <option value="底座">底座</option>
                </datalist>
            </td>
        </tr>
        <tr>
            <th>产品型号</th>
            <td>
<!--                <input type="text" name="model">-->
                <input type="text" list="model" name="model">
                <datalist id="model">
                    <option value="A-12-34">A-12-34</option>
                    <option value="B-12-34">B-12-34</option>
                    <option value="C-12-34">C-12-34</option>
                    <option value="D-12-34">D-12-34</option>
                    <option value="E-12-34">E-12-34</option>
                </datalist>
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
                <input type="text" name="craft_num" value="<?php echo $craft_num; ?>" readonly="readonly">
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
                <input type="number" min="1" name="per_num">
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