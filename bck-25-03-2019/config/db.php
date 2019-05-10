<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=="127.0.0.1" || $_SERVER['HTTP_HOST']=="192.168.1.1"  || $_SERVER['HTTP_HOST']=="[::1]") {
    //Localhhost
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "toyota";
}else{
    //Server
    $servername = "localhost";
    $username = "shobizie_toyota";
    $password = "G4%^Sw@0sg";
    $database = "shobizie_toyota_yaris";
    //$database = "hullb";
}


// Create connection
$db = new mysqli( $servername, $username, $password, $database );

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

include_once 'functions.php';
/*include_once 'data.php';*/

//date_default_timezone_set('Asia/Kolkata');
date_default_timezone_set('Asia/Kolkata');

?>