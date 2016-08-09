<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="../res/libs/jquery/jquery-2.2.0.min.js"></script>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css"/>
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">
    <script>
        $(function () {

            var panelWidth = $(".panel-content").width();
            $(".part-property").width(panelWidth - 50);

            // 初始化中间部分
            var
                contentWidth = panelWidth - 50,
                contentHeight = $(".heat-craft table").height();


            $(".content").width(contentWidth - 70).height(contentHeight);   //根据上面表格设置中间部分宽，根据下面表格设置高

//            console.log(contentWidth);
            $("#image").height(contentHeight - 1);  //设置和右边表格一样高


            // 实现图片预览
            var
                fileInput = document.getElementById("chooseDwg"),
                preview = document.getElementById("image");

            fileInput.addEventListener('change', function () {
                preview.style.backgroundImage = '';
                if (!fileInput.value) {
                    return;
                }


                var imageFile = fileInput.files[0];
                if (imageFile.type !== 'image/jpeg' && imageFile.type !== 'image/png' && imageFile.type !== 'image/gif') {
                    alert('不是有效的图片文件!');
                    return;
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = e.target.result;
                    preview.style.backgroundImage = 'url(' + data + ')';
                };
                reader.readAsDataURL(imageFile);
            });
        });
        function choose() {
            $("#chooseDwg").click();
        }

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

        table caption {
            font-family: Arial;
            font-size: 30px;
        }

        .content {
            padding-left: 30px;
            padding-right: 30px;
        }

        .dwg {
            width: 40%;
            height: auto;
            /*background-color: #00FFFF;*/
            margin: 5px auto;
            float: left;
            text-align: center;
        }

        #image {
            width: auto;
            border: 1px solid #ccc;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .heat-craft {
            width: 60%;
            height: auto;
            /*background-color: #5466da;*/
            margin: 5px auto;
            float: right;

        }

    </style>
</head>
<body>
<div class="edit-panel" style="width:90%;">
    <div class="panel-head">
        <p>添加锻造工艺</p>
    </div>
    <div class="panel-content">
        <form autocomplete="on">
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
                        <caption>固溶处理</caption>
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
                <input id="chooseDwg" type="file" style="" required value="选择图纸">
                <button class="ui-button ui-widget ui-corner-all" onclick="choose()" style="visibility: hidden">选择图纸</button>
                <input class="ui-button ui-widget ui-corner-all" type="submit" value="提交">
                <input class="ui-button ui-widget ui-corner-all" type="reset" value="重置">
            </div>
        </form>
    </div>
</div>
</body>
</html>
