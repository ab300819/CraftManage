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
        echo "<th>$key</th>";
        echo "<td>$value</td>";
        if ($j % $row == 0 && $j != count($table)) {
            echo "</tr>";
            echo "<tr>";
        }
        $j++;
    }
    echo '</tr>';
}

function simple_table($head, $data)
{

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
function key_value($key, $value)
{
    $data = [];
    if (count($key) != count($value)) {
        return null;
    } else {
        for ($i = 0; $i < count($key); $i++) {
            $data[$key[$i]] = $value[$i];
        }
        return $data;
    }
}

?>