<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/30
 * Time: 23:54
 */

namespace data;

class MysqlPDO
{
    private $host;
//    private $port;
    private $user;
    private $password;
    private $dbname;

    private static $connect;
    private static $result;

    public function __construct($host, $user, $password, $dbname)
    {

        $this->host = $host;
//        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;

        self::init();

    }

    private function init()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";

        try {
            self::$connect = new \PDO($dsn, "$this->user", "$this->password");
        } catch (Exception $e) {
            die("数据库连接失败！" . $e->getMessage());
        }
    }

    public function insertAll($sql)
    {
        return $count = self::$connect->exec($sql);

    }

    public function updateAll($sql)
    {

    }

    public function select($sql)
    {
        self::$result = self::$connect->query($sql);
        $list = self::$result->fetchAll();
        if ($list != null) {
            return $list;
        } else {
            echo '没有相关结果！' . '<br>';
        }
    }

    public function simpleSelect($id){
        $sql="SELECT * from testPHP WHERE id='$id'";
        self::select($sql);
    }

    public function delete($sql)
    {

    }

    public function free()
    {
        self::$connect = null;
        self::$result = null;
    }
}

