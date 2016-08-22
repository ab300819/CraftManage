<?php
require_once(dirname(__FILE__) . '/../sql/mysql.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>工艺修改</title>
    <link type="text/css" rel="stylesheet" href="../res/css/custom/panel.css"/>
    <link type="text/css" rel="stylesheet" href="../res/libs/jquery-ui-themes/themes/base/jquery-ui.min.css">
    <!--    <link type="text/css" rel="stylesheet" href="../res/libs/bootstrap/css/bootstrap.min.css"/>-->

    <script type="text/javascript" src="../res/libs/jquery/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="../res/libs/jquery-ui/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(function () {

            // 为输入框添加效果
//            $("#machine:input").addClass("form-control");

            var
                dialog,
                tips = $(".validateTips"),

                action = "../data/action_machine.php?action=add",
                craft_num = $("#craft"),
                material_num = $("#material"),

                form = document.getElementById("machine"),

                allFields = $([]).add(craft_num).add(material_num);

            function updateTips(t) {
                tips
                    .text(t)
                    .addClass("ui-state-highlight");
                setTimeout(function () {
                    tips.removeClass("ui-state-highlight", 1500);
                }, 500);
            }

            function checkInfo(info) {
                if (info.val() == "") {
                    info.addClass("ui-state-error");
                    updateTips("请填写有效信息！");
                    return false;
                } else {
                    return true;
                }
            }

            // 提交表单
            function submitForm() {

                var valid = true;
                allFields.removeClass("ui-state-error");

                valid = valid && checkInfo(craft_num);
                valid = valid && checkInfo(material_num);

                if (valid) {

                    $("input[name='craft_num']").val(craft_num.val());
                    $("input[name='material_num']").val(material_num.val());

                    form.action = action;
                    form.submit();

                    dialog.dialog("close");

//                    console.log(action);
//                    console.log(craft_num.val());
//                    console.log(material_num.val());
                }

                return valid;
            }

            // 初始化对话框
            dialog = $("#add-info").dialog({
                autoOpen: false,
                height: 400,
                width: 350,
                modal: true,
                show: {
                    effect: "drop",
                    direction: "up",
                    duration: 600
                },
                hide: {
                    effect: "explode",
                    duration: 800
                },
                buttons: {
                    "提交": submitForm,
                    "重置": function () {
                        document.getElementById("addValue").reset();
                    },
                    "取消": function () {
                        $(this).dialog("close");
                    }
                }
            });

            $("#submit-to-new").click(function () {
                dialog.dialog("open");
            });

        });
    </script>
    <style type="text/css">
        * {
            font-family: Arial;
        }

        table {
            border-collapse: separate;
            border-spacing: 0px 10px;
        }

        table input {
            width: 300px;
            height: 30px;
        }

        table th {
            /*width: 15%;*/
            /*text-align: center;*/
            font-size: 20px;
            padding-right: 15px;
        }

        table td {
            /*width: 85%;*/
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$id = $_GET['id'];
$product = $_GET['product'];
$list = $db->get_select(MACHINE, "id='$id'");
?>
<!--<h1 style="text-align: center">修改工艺</h1>-->
<div class="edit-panel">
    <div class="panel-head">
        <p>编辑核电机加工工艺</p>
    </div>
    <div class="panel-content">
        <form action="../data/action_machine.php?action=edit" method="post" id="machine">
            <input type="hidden" name="id" value="<?php echo $list['id']; ?>">

            <input type="hidden" name="product_id" value="<?php echo $product; ?>">
            <table class="edit-list" align="center">
                <tr>
                    <th>工艺编号</th>
                    <td><input class="text ui-widget-content ui-corner-all" type="text" name="craft_num"
                               value="<?php echo $list['craft_num']; ?>"
                               readonly="readonly"></td>
                </tr>
                <tr>
                    <th>物料编码</th>
                    <td><input type="text" name="material_num" value="<?php echo $list['material_num']; ?>"></td>
                </tr>
                <tr>
                    <th>工序号</th>
                    <td><input type="text" name="step_num" value="<?php echo $list['step_num']; ?>"></td>
                </tr>
                <tr>
                    <th>车间</th>
                    <td><input type="text" name="room" value="<?php echo $list['room']; ?>"></td>
                </tr>
                <tr>
                    <th>工序名称</th>
                    <td><input type="text" name="name" value="<?php echo $list['name']; ?>"></td>
                </tr>
                <tr>
                    <th>工序内容</th>
                    <td><textarea name="content" form="machine"><?php echo $list['content']; ?></textarea>
                </tr>
                <tr>
                    <th>自检记录</th>
                    <td><input type="text" name="self_check" value="<?php echo $list['self_check']; ?>"></td>
                </tr>
                <tr>
                    <th>操作者</th>
                    <td><input type="text" name="operator" value="<?php echo $list['operator']; ?>"></td>
                </tr>
                <tr>
                    <th>专检记录</th>
                    <td><input type="text" name="special_check" value="<?php echo $list['special_check']; ?>"></td>
                </tr>
                <tr>
                    <th>检验员</th>
                    <td><input type="text" name="checker" value="<?php echo $list['checker']; ?>"></td>
                </tr>
                <tr>
                    <th>设备</th>
                    <td><input type="text" name="machine" value="<?php echo $list['machine']; ?>"/</td>
                </tr>
                <tr>
                    <th>工艺设备</th>
                    <td><input type="text" name="craft_machine" value="<?php echo $list['craft_machine']; ?>"></td>
                </tr>
                <tr>
                    <th>准备时间</th>
                    <td><input type="text" name="prepare_time" value="<?php echo $list['prepare_time']; ?>"></td>
                </tr>
                <tr>
                    <th>运行时间</th>
                    <td><input type="text" name="run_time" value="<?php echo $list['run_time']; ?>"></td>
                </tr>
                <tr>
                    <th>版本号</th>
                    <td><input type="text" name="version" value="<?php echo $list['version']; ?>"></td>
                </tr>
            </table>

            <div class="edit-button">
                <input class="ui-button ui-widget ui-corner-all" type="submit" value="提交">
                <input id="submit-to-new" class="ui-button ui-widget ui-corner-all" type="button" value="新建提交">
                <input class="ui-button ui-widget ui-corner-all" type="reset" value="重置">
            </div>
        </form>
    </div>
</div>

<div id="add-info" title="添加重要信息">
    <p class="validateTips"></p>

    <form id="addValue" style="padding-top: 15px">
        <fieldset>
            <legend>重要信息</legend>

            <div style="padding-top: 20px;padding-bottom: 10px">
                <label ">工艺代码：</label>
                <input class="text ui-widget-content ui-corner-all" type="text" id="craft" list="craft_reference"/>
                <datalist id="craft_reference">
                    <option value="LNP01-2020">
                    <option value="LNP01-2011">
                    <option value="KNP01-2011">
                    <option value="MNP01-2010">
                    <option value="JNP01-2010">
                    <option value="JNP01-2010">
                    <option value="GNP01-2010">
                    <option value="GNP01-2010">
                    <option value="ANP01-2010">
                    <option value="ANP01-2010">
                    <option value="BNP01-2010">
                    <option value="BNP01-2010">
                    <option value="UNP01-2010">
                    <option value="UNP01-2010">
                    <option value="PNP01-2010">
                    <option value="PNP01-2010">
                    <option value="ENP01-2010">
                </datalist>
            </div>
            <div style="padding-top: 10px">
                <label>物料代码：</label>
                <input class="text ui-widget-content ui-corner-all" type="text" id="material"
                       list="material_reference"/>
                <datalist id="material_reference">
                    <option value="AMP0109-2900">
                    <option value="AMP0109-2900">
                    <option value="BMP0109-2900">
                    <option value="BMP0109-2900">
                    <option value="CMP0109-2900">
                    <option value="CMP0109-2900">
                    <option value="DMP0109-2900">
                    <option value="DMP0109-2900">
                    <option value="EMP0109-2900">
                    <option value="EMP0109-2900">
                    <option value="FMP0109-2900">
                </datalist>
            </div>

        </fieldset>
    </form>
</div>

</body>
</html>

