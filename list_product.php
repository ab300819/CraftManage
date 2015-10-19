<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/10/18
 * Time: 14:46
 */
require_once('sql/mysql.php');
require_once('sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>产品列表</title>
    <link href="./res/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="res/js/jquery.js"></script>
    <script>
        function addCol() {
            $col = $("<td>删除</td>");
            $("#product>tbody>tr").append($col);
        }
        function edit() {
            var line = document.getElementById("product").getElementsByTagName("tr");
            for (var i = 0; i < line.length - 2; i++) {
                var td = line[i + 1].getElementsByTagName("td")[0];
                var value = td.innerText;
                td.innerHTML = "<a href=edit_product.php?material_num=" + value + ">" + value + "<a>";
            }
        }

        function doDel(id) {
            if (confirm("确定要删除吗？")) {
                window.location = 'data/action_product.php?action=del&id=' + id;
            }
        }

        function addCraft(id) {
            if (confirmDel("确定添加？")) {
                window.location = 'data/add_craft.php?id=' + id;
            }
        }
    </script>
</head>
<body>
<h1>产品目录</h1>
<a href="test_panel.php">首页</a>

<div align="center">
    <form action="add_product.php" method="post">
        <table align="center" id="product">
            <!--            --><?php
            //            $head = array(
            //                '物料编码',
            //                '产品名称',
            //                '产品型号',
            //            );
            //            $key = array(
            //                'material_num',
            //                'name',
            //                'model'
            //            );
            //            $data = $db->get_choice_select(PRODUCT, $key);
            //            if ($data == null) {
            //                simple_table($head);
            //            } else {
            //                $temp = two_key_value($key, $data);
            //                simple_table($head, $temp);
            //            }
            //            ?>

            <tr>
                <th>物料编码</th>
                <th>产品名称</th>
                <th>产品型号</th>
                <th>编辑</th>
            </tr>
            <tr>
                <?php
                $key = array(
                    'id',
                    'material_num',
                    'name',
                    'model'
                );
                $data = $db->get_choice_select(PRODUCT, $key);
                if ($data == null) {
                    echo "<td>&nbsp;</td>";
                    echo "<td>&nbsp;</td>";
                    echo "<td>&nbsp;</td>";
                    echo "<td>&nbsp;</td>";
                } else {
                    $list = two_key_value($key, $data);
                    foreach ($list as $cell) {
                        foreach ($cell as $name => $value) {
                            if ($name != 'id') {
                                echo "<td>{$value}</td>";
                            }
                        }
                        echo "<td>
                                <a href='edit_product.php?id={$cell['id']}'>编辑</a>
                                <a href='javascript:addCraft({$cell['id']})'>添加工艺</a>
                                <a href='javascript:doDel({$cell['id']})'>删除</a>
                              </td>";
                        echo "</tr>";
                    }
                }
                ?>
            <tr>
                <td><input type="text" name="material_num" required="required"></td>
                <td><input type="text" name="name" required="required"></td>
                <td><input type="text" name="model" required="required"></td>
                <td></td>
            </tr>
        </table>
        <input type="submit" value="提交">
        <input type="reset" value="重置">
        <input type="button" onclick="edit()" value="编辑">
    </form>
</div>

</body>
</html>
