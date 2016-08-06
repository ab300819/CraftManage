<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>热处理工艺</title>

    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css"/>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/list.css">
    <link type="text/css" rel="stylesheet" href="../res/css/custom/button.css">

    <script type="text/javascript" src="../res/libs/jquery/jquery-2.2.0.min.js"></script>
    <script>
        $(function () {
            var fileInput = document.getElementById('test-image-file');
            var info = document.getElementById('test-file-info');
            var preview = document.getElementById('test-image-preview');
            fileInput.addEventListener('change', function () {
                preview.style.backgroundImage = '';
                if (!fileInput.value) {
                    info.innerHTML = '没有选择文件';
                    return;
                }
                var file = fileInput.files[0];
                info.innerHTML = '文件: ' + file.name + '<br>' +
                        '大小: ' + file.size + '<br>' +
                        '修改: ' + file.lastModifiedDate;
                if (file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/gif') {
                    alert('不是有效的图片文件!');
                    return;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    var
                            data = e.target.result;
                    index = data.indexOf(';base64,');
                    preview.style.backgroundImage = 'url(' + data + ')';
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    <style>
        .showImage {
            border: 1px solid #ccc;
            width: 400px;
            min-height: 200px;
            background-size: contain;
            background: no-repeat center center;
            float: left;
            margin: 50px auto;
        }

        #test-image-preview {
            background-size: contain;
            background: no-repeat center center;
        }
    </style>
</head>
<body style="text-align: center">
<h1>添加热处理工艺</h1>

<form action="../data/action_heat.php?action=add" method="post" enctype="multipart/form-data">
    <div align="center">
        <table class="show-list">
            <tr>
                <th>零件名称</th>
                <th>材料</th>
                <th>抗拉强度(MPa)</th>
                <th>延伸率(%)</th>
                <th>硬度</th>
                <th>设备</th>
                <th>热处理类型</th>
            </tr>
            <tr>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
                <td><input type="text" name=""></td>
            </tr>
        </table>
    </div>
    <div style="padding-top: 10px;height: 500px">
        <div class="showImage">
            <div id="test-image-preview">

            </div>
            <input type="file" id="test-image-file" name="test">
        </div>

        <div style="float: right;width: 40%;margin: 0px auto;min-height: 200px">
            <table class="show-list">
                <tr>
                    <th>炉装温度(℃)</th>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <th>升温温度(℃/h)</th>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <th>加温温度(℃)</th>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <th>保温时间(h)</th>
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
                <tr>
                    <th>&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td></td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div style="padding-top: 50px">
        <input class="button white" type="submit" value="提交">
        <input class="button white" type="reset" value="重置">
    </div>
</form>
</body>
</html>