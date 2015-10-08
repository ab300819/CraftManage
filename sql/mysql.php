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
                self::init(MYSQL_LOCAL, MYSQL_USER, MYSQL_PW, DATABASE);
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

    /**单表查询，根据条件或查询全部
     * @param $table    表名
     * @param null $condition   条件
     * @return mixed    返回数据
     */
    public function get_select($table, $condition = null)
    {
        if ($condition == null) {
            $sql = "SELECT * from {$table}";
            $result = self::$connect->query($sql);
            $list = $result->fetchAll();
        } else {
            $sql = "SELECT * from {$table} WHERE {$condition}";
            $result = self::$connect->query($sql);
            $list = $result->fetch(\PDO::FETCH_ASSOC);
        }
        return $list;
    }

    public function get_link_select($main,$link,$head,$condition=null){

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

    /**
     * @param $table 更新表名
     * @param $info  更新数据
     * @param $condition  更新位置
     * @return bool|string  传入数据正确返回SQL数据，否则返回false
     */
    public function update_data($table, $info, $condition)
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

    public function delete_data($table, $condition)
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

