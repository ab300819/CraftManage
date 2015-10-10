<?php

/**
 * 根据表头和表值产生表格
 * @param $table 传入表格键值对
 * @param $row  表的列数
 */
function key_value_table($table, $row)
{
    $j = 1;
    echo '<tr>';
    foreach ($table as $key => $value) {
        echo "<th>{$key}：</th>";
        if (empty($value)) {
            echo "<td>&nbsp;</td>";
        } else {
            echo "<td>$value</td>";
        }
        if ($j % $row == 0 && $j != count($table)) {
            echo "</tr>";
            echo "<tr>";
        }
        $j++;
    }
    echo '</tr>';
}

/**
 * 自动生成简单列表
 * @param $head 表头
 * @param $content  表内容
 */
function simple_table($head, $content = null)
{
    if ($content == null || count($head) != count($content)) {
        echo '<tr>';
        foreach ($head as $cell) {
            echo "<th>{$cell}</th>";
        }
        echo '</tr>';
    } else {
        echo '<tr>';
        foreach ($head as $cell) {
            echo "<th>{$cell}</th>";
        }
        echo '</tr><tr>';
        foreach ($content as $list) {
            foreach ($list as $key => $value) {
                echo "<td>{$value}</td>";
            }
        }
        echo '</tr>';
    }
}

/**
 * 将键值对转换为一维数组
 * @param $list 传入键值对
 * @return mixed    返回普通一维数组
 */
function key_value_change_one($list)
{

    $data = [];
    $i = 0;
    foreach ($list as $key => $value) {
        $data[$i] = $value;
        $i++;
    }
    return $data;
}

/**
 * 将两个二维数组转换为一个键值对
 * @param $key  键
 * @param $value    值
 * @return mixed   条件正确返回键值对，否则返回null
 */
function key_value($key, $value = null)
{
    $data = [];
    if ($value == null) {
        for ($i = 0; $i < count($key); $i++) {
            $data[$key[$i]] = null;
        }
        return $data;
    } elseif (count($key) == count($value)) {
        for ($i = 0; $i < count($key); $i++) {
            $data[$key[$i]] = $value[$i];
        }
        return $data;
    } else {
        return null;
    }
}

/**
 * @param $head 表单头部信息
 * @param $name input的name
 * @param null $value input的值
 * @param null $readonly 只读属性的input组
 * @param null $area 设置需要textarea的input
 * @param null $form form id
 */
//TODO 有问题
function generate_form($head, $name, $value = null, $readonly = null, $area = null, $form = null)
{
    if (count($head) != count($name)) {
        echo '<tr>';
        echo '<th></th>>';
        echo '<td></td>>';
        echo '</tr>';
    } elseif ($value == null) {
        for ($i = 0; $i < count($head); $i++) {
            echo '<tr>';
            echo '<th>{$head[$i}：</th>';
            if (traverse($name, $area)) {
                echo "<td></td>";
            } else {
                echo "<td><input type=\"text\" name=\"{$name[$i]}\"></td>";
            }
            echo '</tr>';
        }
    } else {
        for ($j = 0; $j < count($head); $j++) {
            echo '<tr>';
            echo '</tr>';
        }
    }
}

function traverse($compare, $item)
{

    if ($item == null) {
        return false;
    } else {
        foreach ($item as $son) {
            if ($son == $compare) {
                return true;
            }
        }
    }

}

?>