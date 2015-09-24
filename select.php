<?php
require_once('sql/mysql.php');
require_once('sql/operate.php');
session_start();
$user = $_SESSION['user'];
$level = $_SESSION[$user];
$db = new \sql\MysqlPDO($level);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>工艺查询</title>
</head>
<link rel="stylesheet" type="text/css" href="./res/css/style.css">
<body>
<?php
include("select_menu.php");
?>
</body>
</html>