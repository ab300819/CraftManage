<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加装配工艺</title>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css">
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">

</head>
<body>
<div class="edit-panel">
    <div class="panel-head">
        <p>添加装配工艺</p>
    </div>
    <div class="panel-content">
        <form action="../data/action_assembly.php?action=add" method="post" id="assembly">
            <table class="edit-list" align="center">
                <tr>
                    <th>工序</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>工序名称</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>工序要求</th>
                    <td>
                        <textarea rows="9" cols="90" name="" form="assembly"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>自检记录</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>装配人员</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>检验记录</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>检验结论</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>检验员</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>见证</th>
                    <td><input type="text" name=""></td>
                </tr>
                <tr>
                    <th>工艺装备</th>
                    <td><input type="text" name=""></td>
                </tr>
            </table>
            <div class="edit-button">
                <input class="ui-button ui-widget ui-corner-all" type="submit" value="提交">
                <input class="ui-button ui-widget ui-corner-all" type="reset" value="重置">
            </div>
        </form>
    </div>
</div>

</body>
</html>
