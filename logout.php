<?php
/**
 * Created by PhpStorm.
 * User: vinayj
 * Date: 26-02-2019
 * Time: 12:04
 */
?>

<?php
session_start();
session_destroy();
header("location:index.php");
?>
