<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/30
 * Time: 23:54
 */

namespace data;

require_once 'user_config.php';

class MysqlPDO
{

    private static $connect;

    public function __construct($level)
    {

        switch ($level) {
            case 0:
                self::init(MYSQL_LOCAL, MYSQL_USER, MYSQL_pw, DBname);
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

    public function select($sql)
    {
        $result = self::$connect->query($sql);
        $list = $result->fetchAll();
        if ($list != null) {
            return $list;
        } else {
            echo '没有相关数据！' . '<br>';
        }
    }

    public function simpleSelect($id)
    {
        $sql = "SELECT * from craft_test WHERE id='$id'";
        $result = self::$connect->query($sql);
        $list = $result->fetch(\PDO::FETCH_ASSOC);
        if ($list != null) {
            return $list;
        } else {
            echo '没有相关数据！' . '<br>';
        }

    }

    public function insert($sql)
    {

    }

    public function update($sql)
    {
    }

    public function delete($sql)
    {

    }

    public function simpleDelete($id)
    {
        $sql = "DELETE FROM craft_test WHERE id='$id'";
        return self::action($sql);
    }

    public function action($sql)
    {
        return self::$connect->exec($sql);
    }

    public function free()
    {
        self::$connect = null;
    }
}

