<?php
include('config/db.php');
$postData = $_REQUEST;
$file_name = '';
/*echo '<pre>';
var_dump($_FILES);
var_dump($_REQUEST);
die();*/

if(isset($_FILES['rrcbook']) && !empty($_FILES['rrcbook']['name'])){

    $errors = array();
    $file_name = $_FILES['rrcbook']['name'];
    $file_size = $_FILES['rrcbook']['size'];
    $file_tmp = $_FILES['rrcbook']['tmp_name'];
    $file_type = $_FILES['rrcbook']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    //$file_ext = strtolower(end(explode('.',$_FILES['uploads']['name'])));
    $expensions = array("jpeg","jpg","png","JPEG");
    //var_dump($file_ext);


    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 10485760) { //25MB = 26214400  // 2MB = 2097152 // 1MB = 1,048,576 bytes 5MB = 5242880
        $errors[]='File size must be exactly 5 MB';
    }

    if(empty($errors)==true) {
        $file_name = rand_str(10).".".$file_ext;
        move_uploaded_file($file_tmp,"uploads/".$file_name);

    }else{
        $msg = "Something went wrong.Please try again later";
    }
}



$checkSql = $db->query("SELECT feedback_id FROM feedback WHERE mobile='".$postData['mno']."'");
$total_num = $checkSql->num_rows;

if($total_num <= 0) {
$sql = $db->query('INSERT INTO `feedback` SET `crew_user_id`="'.$_SESSION['users_id'].'",`name`="'.$postData['uname'].'",`mobile`="'.$postData['mno'].'",`email_id`="'.$postData['emmail'].'",`age`="'.$postData['aage'].'",`gender`="'.$postData['ggender'].'",`city_id`="'.$postData['sstate'].'",`pincode`="'.$postData['ppincodenew'].'",`occupation`="'.$postData['ooccupation'].'",`car_brand`="'.$postData['brand11'].'",`car_model`="'.$postData['car11'].'",`car_age`="'.$postData['yr11'].'",`car_purchase_plan`="'.$postData['rr0'].'",`nearest_dealership`="'.$postData['ccity'].'",`drive_image`="'.$file_name.'"');
 
//Add OTP code here
//$ins_id = $db->insert_id;
//$randNum = rand(111111,999999);
//$updSql = $db->query("UPDATE feedback SET OTP='". $randNum."' WHERE feedback_id='".$ins_id."'"); 

//Send sms
} else {
$sql = $db->query('UPDATE `feedback` SET `crew_user_id`="'.$_SESSION['users_id'].'",`name`="'.$postData['uname'].'",`mobile`="'.$postData['mno'].'",`email_id`="'.$postData['emmail'].'",`age`="'.$postData['aage'].'",`gender`="'.$postData['ggender'].'",`city_id`="'.$postData['sstate'].'",`pincode`="'.$postData['ppincodenew'].'",`occupation`="'.$postData['ooccupation'].'",`car_brand`="'.$postData['brand11'].'",`car_model`="'.$postData['car11'].'",`car_age`="'.$postData['yr11'].'",`car_purchase_plan`="'.$postData['rr0'].'",`nearest_dealership`="'.$postData['ccity'].'",`drive_image`="'.$file_name.'" WHERE `mobile`="'.$postData['mno'].'"');
}
if($sql) {
 $response = array('status'=>'1','message'=> 'You are registered successfully.');
} else {
$response = array('status'=>'1','message'=> 'Unable to register.');
}

echo json_encode($response);

$db->close();
/*
$postData['mno'];

$postData['emmail'];

$postData['aage'];

$postData['ggender'];

$postData['sstate']

$postData['ccity']

$postData['ppincodenew'] 

$postData['ooccupation'] 

$postData['brand11'] 

$postData['car11'] 
$postData['yr11']
$postData['brand12'] 

$postData['car12'] 
$postData['yr12'] 
$postData['brand13']

$postData['car13'] 
$postData['yr13'] 
$postData['rr0'] 
$postData['locationnew'] 
$postData['useridnew']*/

?>