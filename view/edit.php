<?php
require_once(dirname(__FILE__) . '/../data/config.php');
require_once(dirname(__FILE__) . '/../data/mysql.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改数据</title>
</head>
<body>
<?php
if ($_GET['id']!='') {
    $id = $_GET['id'];
    $db=new \data\MysqlPDO(MYSQL_LOCAL,MYSQL_USER,MYSQL_pw,'demo');
    $result = $db->simpleSelect($id);
    $db->free();
} else {
    die("No id!");
}
?>
<form action="../control/editData.php" method="post">
    <div>
        工序号:
        <input type="text" name="id" value="<?php echo $id; ?>" readonly="true">
    </div>
    <div>
        车间：
        <input type="text" name="username" value="<?php echo $result['username']; ?>">
    </div>
    <div>
        工序内容：
        <input type="text" name="passwd" value="<?php echo $result['passwd']; ?>">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
</body>
</html>

