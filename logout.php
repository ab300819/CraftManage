<?php
/**
 * Created by PhpStorm.
 * User: Paradise
 * Date: 2016/2/14
 * Time: 21:42
 */

session_start();

session_destroy();
unset($_SESSION);

echo "<script>window.location='index.html'</script>";

?>