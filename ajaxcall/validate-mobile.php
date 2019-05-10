<?php

include('../config/db.php');
if($_POST['mobileno']) {
    $mobile_no = $_POST['mobileno'];
    $sql = $db->query("SELECT * FROM `feedback`  WHERE mobile = '$mobile_no'");
    if ($sql->num_rows > 0){
        echo 'Mobile Number is already register';
    }
}else{

}
$db->close();