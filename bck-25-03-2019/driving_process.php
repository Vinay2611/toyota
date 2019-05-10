<?php
include('config/db.php');
$postData = $_REQUEST;
$file_name = '';

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


$sql = $db->query('UPDATE `feedback` SET `drive_image`="'.$file_name.'" WHERE `feedback_id`="'.$postData['feedback_id'].'"');

if($sql) {
    $response = array('status'=>'1','message'=> 'You are registered successfully.');
} else {
    $response = array('status'=>'1','message'=> 'Unable to register.');
}

echo json_encode($response);

$db->close();