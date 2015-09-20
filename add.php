<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>工艺管理</title>
</head>
<link rel="stylesheet" type="text/css" href="/res/css/style.css">
<body>
<?php include("edit_menu.php") ?>
<h2>增加工艺</h2>

<form action="./data/action.php?action=add" method="post" id="craft">
    <table>
        <tr>
            <th>工序号</th>
            <td><input type="text" name="cr_num"/></td>
        </tr>
        <tr>
            <th>工序名称</th>
            <td><input type="text" name="cr_name"/></td>
        </tr>
        <tr>
            <th>工序内容</th>
            <td><textarea rows="4" cols="50" name="cr_content" form="craft"></textarea>
        </tr>
        <tr>
            <th>车间</th>
            <td><input type="text" name="cr_room"/></td>
        </tr>
        <tr>
            <th>设备</th>
            <td><input type="text" name="cr_machine"/></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td>
                <input type="submit" value="提交"/>
                <input type="reset" value="重置"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>