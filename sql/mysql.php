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

    private static $connect;

    public function __construct($level)
    {

        switch ($level) {
            case 0:
                self::init(MYSQL_LOCAL, MYSQL_USER, MYSQL_pw, DATABASE);
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
        }
    }

    private function init($host, $user, $password, $dbname)
    {

        $dsn = "mysql:host=$host;dbname=$dbname";

        try {
            self::$connect = new \PDO($dsn, "$user", "$password");
        } catch (Exception $e) {
            die("数据库连接失败！" . '<br>' . $e->getMessage());
        }
    }

    public function get_all_select_data($table, $condition = null)
    {
        if ($condition == null) {
            $sql = "SELECT * from {$table}";
        } else {
            $sql = "SELECT * from {$table} WHERE {$condition}";
        }
        $result = self::$connect->query($sql);
        $list = $result->fetchAll();
        if ($list != null) {
            return $list;
        } else {
            echo '没有相关数据！' . '<br>';
        }
    }

    public function get_single_select_data($table, $condition)
    {
        $sql = "SELECT * from {$table} WHERE {$condition}";
        $result = self::$connect->query($sql);
        $list = $result->fetch(\PDO::FETCH_ASSOC);
        if ($list != null) {
            return $list;
        } else {
            echo '没有相关数据！' . '<br>';
        }

    }

    /**
     * @param $table 插入表名
     * @param $info 插入数据
     * 用于拼装插入SQL语句
     * @return bool|string 传入数据正确返回SQL数据，否则返回false
     */
    public function get_insert_db_sql($table, $info)
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

    /**
     * @param $table 更新表名
     * @param $info  更新数据
     * @param $condition  更新位置
     * @return bool|string  传入数据正确返回SQL数据，否则返回false
     */
    public function get_update_db_sql($table, $info, $condition)
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

    public function get_delete_db_sql($table, $condition)
    {
        $sql = "DELETE FROM {$table} WHERE {$condition}";
        return self::execute($sql);
    }

    public function execute($sql)
    {
        return self::$connect->exec($sql);
    }

    public function free()
    {
        self::$connect = null;
    }
}

