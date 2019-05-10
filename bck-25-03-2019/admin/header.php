<?php
/**
 * Created by PhpStorm.
 * User: vinayj
 * Date: 26-02-2019
 * Time: 15:54
 */
?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ERROR | E_PARSE);
if(!isset($_SESSION['adminloggedin']))
{
    header("location: login.php");
}
else
{
    include('../config/db.php');
}
include('../config/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Admin | Dashboard</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--alertify js and css-->
    <script src="../assets/alertifyjs/alertify.min.js"></script>
    <!-- include the style -->
    <link rel="stylesheet" href="../assets/alertifyjs/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="../assets/alertifyjs/css/themes/default.min.css" />
</head>
