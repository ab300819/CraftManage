<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/30
 * Time: 23:54
 */

namespace data;

require_once 'config.php';

class MysqlPDO
{

    private static $connect;
    private static $result;

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
            die("数据库连接失败！" . $e->getMessage());
        }
    }

    public function insert($sql)
    {
        return $count = self::$connect->exec($sql);

    }

    public function update($sql)
    {
        self::$connect->exec($sql);
    }

    public function select($sql)
    {
        self::$result = self::$connect->query($sql);
        $list = self::$result->fetchAll();
        if ($list != null) {
            return $list;
        } else {
            echo '没有数据！' . '<br>';
        }
    }

    public function simpleSelect($id)
    {
        $sql = "SELECT * from testPHP WHERE id='$id'";
        return self::select($sql);
    }

    public function delete($sql)
    {
        self::$connect->exec($sql);
    }

    public function simpleDelete($id)
    {
        $sql = "DELETE FROM testPHP WHERE id='$id'";
        self::delete($sql);
    }

    private function complete($sql)
    {

    }

    public function free()
    {
        self::$connect = null;
        self::$result = null;
    }
}

