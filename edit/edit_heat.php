<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/9/29
 * Time: 21:51
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="../res/libs/jquery/jquery-2.2.0.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css"/>
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">
    <script>
        $(function () {

            var
                contentWidth = $(".part-property").width(),
                contentHeight = $(".heat-craft table").height();
            $(".content").width(contentWidth).height(contentHeight);

//            console.log(tableHeight);
            $("#image").height(contentHeight - 1);

        });
    </script>
    <style type="text/css">

        table {
            border-collapse: separate;
            border-spacing: 10px 15px;
        }

        table input {
            width: 190px;
            height: 25px;
        }

        .dwg {
            width: 40%;
            height: auto;
            background-color: #00FFFF;
            margin: 5px auto;
            float: left;
            text-align: center;
        }

        #image {
            width: 640px;
            border: 1px solid #ccc;
            background-size: contain;
            background: no-repeat center center;
        }

        .heat-craft {
            width: 60%;
            height: auto;
            background-color: #5466da;
            margin: 5px auto;
            float: right;

        }

    </style>
</head>
<body>
<div class="edit-panel" style="width: 90%;">
    <div class="panel-head">
        <p>添加锻造工艺</p>
    </div>
    <div class="panel-content">
        <form>
            <div class="part-property">
                <table align="center">
                    <tr>
                        <th>零件名称</th>
                        <th>材　料</th>
                        <th>抗拉强度(MPa)</th>
                        <th>延伸率(%)</th>
                        <th>硬　度</th>
                        <th>设　备</th>
                        <th>热处理类型</th>
                    </tr>
                    <tr>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </tr>
                </table>
            </div>
            <div class="content">

                <div class="dwg">
                    <div id="image">

                    </div>

                </div>
                <div class="heat-craft">
                    <table align="center">
                        <caption align="left">固溶处理</caption>
                        <tr>
                            <th>装炉温度（℃）</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>升温速度（℃/h）</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>加热温度（℃）</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>保温时间（h）</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>冷却介质</th>
                            <td><input type="text"></td>
                        </tr>
                        <tr>
                            <th>冷却速度</th>
                            <td><input type="text"></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="edit-button">
                <input class="ui-button ui-widget ui-corner-all" type="button" value="选择图片">
                <input class="ui-button ui-widget ui-corner-all" type="submit" value="提交">
                <input class="ui-button ui-widget ui-corner-all" type="reset" value="重置">
            </div>
        </form>
    </div>
</div>
</body>
</html>
