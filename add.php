<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>工艺管理</title>
</head>
<body>
<center>
    <?php include("menu.php") ?>
    <h3>增加工艺</h3>

    <form action="./data/action.php?action=add" method="post">
        <table>
            <tr>
                <td>工序号</td>
                <td><input type="text" name="cr_num"/></td>
            </tr>
            <tr>
                <td>工序名称</td>
                <td><input type="text" name="cr_name"/></td>
            </tr>
            <tr>
                <td>工序内容</td>
                <td><input type="text" name="cr_content"/></td>
            </tr>
            <tr>
                <td>车间</td>
                <td><input type="text" name="cr_room"/></td>
            </tr>
            <tr>
                <td>设备</td>
                <td><input type="text" name="cr_machine"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="提交"/>
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>
    </form>
</center>

</body>
</html>