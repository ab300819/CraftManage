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
    <title>产品信息</title>
    <link href="../res/css/custom/editList.css" rel="stylesheet" type="text/css">
    <link href="../res/css/custom/button.css" rel="stylesheet" type="text/css">

    <script>
        function selectValue(select, value) {
            var sel = document.getElementById(select);
            var op = sel.options;
            for (var i = 0; i < op.length; i++) {
                var tempValue = op[i].value;
                if (tempValue == value) {
                    op[i].selected = true;
                }
            }
        }

    </script>
</head>
<body style="text-align: center">
<?php
$id = $_GET['id'];
$list = $db->get_select(PRODUCT, "id={$id}");
?>
<h1>修改产品信息</h1>

<form action="../data/action_product.php?action=edit" method="post" id="product">
    <input type="hidden" name="id" value="">
    <table class="show_list">
        <tr>
            <th>物料编码</th>
            <td>
                <input type="text" name="material_num" value="<?php echo $list['material_num']; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <th>物料名称</th>
            <td>
                <input type="text" name="material_name" value="<?php echo $list['material_name']; ?>">
            </td>
        </tr>
        <tr>
            <th>产品名称</th>
            <td>
                <input type="text" name="name" value="<?php echo $list['name']; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <th>产品型号</th>
            <td>
                <input type="text" name="model" value="<?php echo $list['model']; ?>" readonly="readonly">
            </td>
        </tr>
        <tr>
            <th>产品编号</th>
            <td>
                <input type="text" name="num" value="<?php echo $list['num']; ?>">
            </td>
        </tr>
        <tr>
            <th>规格型号</th>
            <td>
                <input type="text" name="standard" value="<?php echo $list['standard']; ?>">
            </td>
        </tr>
        <tr>
            <th>零件标识</th>
            <td>
                <input type="text" name="component_discern" value="<?php echo $list['component_discern']; ?>">

            </td>
        </tr>
        <tr>
            <th>零件编号</th>
            <td>
                <input type="text" name="component_num" value="<?php echo $list['component_num']; ?>">
            </td>
        </tr>
        <tr>
            <th>零件图号</th>
            <td>
                <input type="text" name="component_draw" value="<?php echo $list['component_draw']; ?>">
            </td>
        </tr>
        <tr>
            <th>装配图号</th>
            <td>
                <input type="text" name="assemble_draw" value="<?php echo $list['assemble_draw']; ?>">
            </td>
        </tr>
        <tr>
            <th>工艺路线名称</th>
            <td>
                <input type="text" name="craft_line" value="<?php echo $list['craft_line']; ?>">
            </td>
        </tr>
        <tr>
            <th>生产型号</th>
            <td>
                <input type="text" name="produce_model" value="<?php echo $list['produce_model']; ?>">
            </td>
        </tr>
        <tr>
            <th>工艺编号</th>
            <td>
                <input type="text" name="craft_num" value="<?php echo $list['craft_num']; ?>">
            </td>
        </tr>
        <tr>
            <th>生产批号</th>
            <td>
                <input type="text" name="produce_num" value="<?php echo $list['produce_num']; ?>">
            </td>
        </tr>
        <tr>
            <th>材料牌号</th>
            <td>
                <input type="text" name="material" value="<?php echo $list['material']; ?>">
            </td>
        </tr>
        <tr>
            <th>材料标识</th>
            <td>
                <input type="text" name="material_discern" value="<?php echo $list['material_discern']; ?>">
            </td>
        </tr>
        <tr>
            <th>毛坯种类</th>
            <td>
                <input type="text" name="blank" value="<?php echo $list['blank']; ?>">
            </td>
        </tr>
        <tr>
            <th>每台件数</th>
            <td>
                <input type="text" name="per_num" value="<?php echo $list['per_num']; ?>">
            </td>
        </tr>
        <tr>
            <th>热处理状态</th>
            <td>
                <input type="text" name="heat" value="<?php echo $list['heat']; ?>">
            </td>
        </tr>
        <tr>
            <th>产品类别</th>
            <td>
                <select name="belong" form="product" required="required" id="belong">
                    <option value="核电">核电</option>
                    <option value="冶金">冶金</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>工艺类型</th>
            <td>
                <select name="craft_type" form="product" id="type">
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

    <div style="padding-top: 5px;margin:0 auto;">
        <input class="button white" type="submit" value="提交"/>
        <input class="button white" type="reset" value="重置">
    </div>
</form>
<script>
    selectValue('belong', '<?php echo $list['belong']?>');
    selectValue('type', '<?php echo $list['craft_type'] ?>');
</script>
</body>
</html>