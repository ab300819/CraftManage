<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/30
 * Time: 23:54
 */

namespace sql;

require_once 'user_config.php';
require_once 'table_config.php';

class MysqlPDO
{

    private $connect;

    public function __construct()
    {
        $host = MYSQL_LOCAL;
        $dbname = DATABASE;

        $dsn = "mysql:host=$host;dbname=$dbname";

        try {
            $this->connect = new \PDO($dsn, MYSQL_USER, MYSQL_PW);
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**单表查询，根据条件或查询全部
     * @param $table    表名
     * @param null $condition
     * @return mixed 返回数据
     */
    public function get_select($table, $condition = null)
    {
        if ($condition == null) {
            $sql = "SELECT * from {$table}";
            $result = $this->connect->query($sql);
            if ($result != null) {
                $list = $result->fetchAll();
                return $list;
            } else {
                return null;
            }
        } else {
            $sql = "SELECT * from {$table} WHERE {$condition}";
            $result = $this->connect->query($sql);
            if ($result != null) {
                $list = $result->fetch(\PDO::FETCH_ASSOC);
                return $list;
            } else {
                return null;
            }
        }
    }

    public function get_craft_select($table, $condition)
    {
        $sql = "SELECT * FROM {$table} WHERE {$condition}";
        $result = $this->connect->query($sql);
        if ($result != null) {
            $list = $result->fetchAll();
            return $list;
        } else {
            return null;
        }
    }

    public function get_choice_select($table, $head, $condition = null)
    {
        $field = implode(',', $head);
        if ($condition == null) {
            $sql = "SELECT {$field} from {$table}";
            $result = $this->connect->query($sql);
            if ($result != null) {
                $list = $result->fetchAll();
                return $list;
            } else {
                return null;
            }
        } else {
            $sql = "SELECT {$field} FROM {$table} WHERE {$condition}";
            $result = $this->connect->query($sql);
            if ($result != null) {
                $list = $result->fetch(\PDO::FETCH_ASSOC);
                return $list;
            } else {
                return null;
            }
        }
    }

    /**
     * @param $table 插入表名
     * @param $info 插入数据
     * 用于拼装插入SQL语句
     * @return bool|string 传入数据正确返回SQL数据，否则返回false
     */
    public function insert_data($table, $info)
    {
        if (is_array($info) && !empty($info)) {
            $i = 0;
            foreach ($info as $key => $val) {
                $fields[$i] = $key;
                $value[$i] = $val;
                $i++;
            }
            $in_field = '(' . implode(",", $fields) . ')';
            $in_value = "('" . implode("','", $value) . "')";
            $sql = "INSERT INTO {$table}{$in_field} VALUES {$in_value}";
            return $sql;
        } else {
            return false;
        }
    }

    public function insert_two_data($table_1, $table_2)
    {

    }

    /**
     * @param $table 更新表名
     * @param $info  更新数据
     * @param $condition  更新位置
     * @return bool|string  传入数据正确返回SQL数据，否则返回false
     */
    public function updateData($table, $info, $condition)
    {

        $i = 0;
        $data = '';

        if (is_array($info) && !empty($info)) {
            foreach ($info as $key => $val) {
                if ($i == 0) {
                    $data = $key . "='" . $val . "'";
                } else {
                    $data .= ',' . $key . "='" . $val . "'";
                }
                $i++;
            }
            $sql = 'UPDATE ' . $table . ' SET ' . $data . ' WHERE ' . $condition;
            return $sql;
        } else {
            return false;
        }
    }

    public function delData($table, $condition)
    {
        $sql = "DELETE FROM {$table} WHERE {$condition}";
        return $this->execute($sql);
    }

    //更新部分方法
    public function select($data, $table, $condition = null)
    {
        if (count($data) < 2) {
            $str = $data[0];
        } else {
            $str = implode(",", $data);
        }

        $sql = "SELECT $str FROM $table";

        if ($condition != null) {
            $sql = $sql . " WHERE '$condition'";
        }

        $selectData = $this->connect->query($sql);
        $result = $selectData->fetchAll(\PDO::FETCH_CLASS);
        return $result;
    }



    public function update($data, $table, $condition)
    {

    }

    public function delete($data, $table, $condition)
    {

    }


    public function execute($sql)
    {
        try {
            $result = $this->connect->prepare($sql);
            $result->execute();
        } catch (\PDOException $e) {
            exit('SQL语句：' . $sql . '<br />错误信息：' . $e->getMessage());
        }
        return $result;
    }

}

