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
    <script>
        function edit() {
            line = document.getElementById("product").getElementsByTagName("tr");
            for (i = 0; i < line.length - 2; i++) {
                td = line[i + 1].getElementsByTagName("td")[0];
                value = td.innerText;
                td.innerHTML = "<a href='edit_product.php"'>" + value + "<a>";
            }
        }
    </script>
</head>
<body>
<h1>产品目录</h1>

<div align="center">
    <form action="add_product.php" method="post">
        <table align="center" id="product">
            <?php
            $head = array(
                '物料编码',
                '产品名称',
                '产品型号',
            );
            $key = array(
                'material_num',
                'name',
                'model'
            );
            $data = $db->get_link_select(PRODUCT, 'property', PROPERTY, 'id', $key);
            if ($data == null) {
                simple_table($head);
            } else {
                simple_table($head, two_key_value($key, $data));
            }
            ?>

            <tr>
                <td><input type="text" name="material_num" required="required"></td>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="model"></td>
            </tr>
        </table>
        <input type="submit" value="提交">
        <input type="reset" value="重置">
        <input type="button" onclick="edit()" value="编辑">
    </form>
</div>
</body>
</html>
