<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>工艺管理</title>
</head>
<link rel="stylesheet" type="text/css" href="/res/css/style.css">
<body>
<?php include("edit_menu.php") ?>
<h2>增加机加工工艺</h2>

<form action="data/action_machine.php?action=add" method="post" id="machine">
    <table align="center">
        <tr>
            <th>工艺编号</th>
            <td><input type="text" name="craft_num" ></td>
        </tr>
        <tr>
            <th>物料编码</th>
            <td><input type="text" name="material_num"></td>
        </tr>
        <tr>
            <th>工序号</th>
            <td><input type="text" name="step_num"/></td>
        </tr>
        <tr>
            <th>车间</th>
            <td><input type="text" name="room"/></td>
        </tr>
        <tr>
            <th>工序名称</th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>工序内容</th>
            <td><textarea rows="9" cols="90" name="content" form="machine"></textarea></td>
        </tr>
        <tr>
            <th>自检记录</th>
            <td><input type="text" name="self_check"/></td>
        </tr>
        <tr>
            <th>操作者</th>
            <td><input type="text" name="operator"></td>
        </tr>
        <tr>
            <th>专检记录</th>
            <td><input type="text" name="special_check"></td>
        </tr>
        <tr>
            <th>检验员</th>
            <td><input type="text" name="checker"></td>
        </tr>
        <tr>
            <th>设备</th>
            <td><input type="text" name="machine"/></td>
        </tr>
        <tr>
            <th>工艺设备</th>
            <td><input type="text" name="craft_machine"/></td>
        </tr>
        <tr>
            <th>准备时间</th>
            <td><input type="text" name="prepare_time"/></td>
        </tr>
        <tr>
            <th>运行时间</th>
            <td><input type="text" name="run_time"/></td>
        </tr>
        <tr>
            <th>版本号</th>
            <td><input type="text" name="version"/></td>
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