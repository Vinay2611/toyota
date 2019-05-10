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
 
if($sql) { 
/*$usermobile = '91'.$postData['mno'];
echo "https://meo.co.in/MessagingAPI/sendMessage.php?LoginId=9833696603&password=amit@6804&mobile_number=".$usermobile."&message=http://www.shobiztech.com/toyota/img/whatapp_sl.jpg";*/

 $baseurl = "https://meo.co.in/MessagingAPI/sendMessage.php";
        $username = "9833696603";
        $pw = "amit@6804";
        $usermobile = '91'.$postData['mno'];
       
        $params = array("command"=>"createcustomer", "LoginId"=>$username, "password"=>$pw, 
        "mobile_number"=>$usermobile,"message"=>'http://www.shobiztech.com/toyota/img/whatapp_sl.jpg');
        $link = $baseurl . '?' . http_build_query($params);



             $ch = curl_init();              
             // Set query data here with the URL
             curl_setopt($ch, CURLOPT_URL, $link);

             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             curl_setopt($ch, CURLOPT_TIMEOUT, '3');
             $content = trim(curl_exec($ch));
             curl_close($ch);
             //print $content;

$subject = "Toyota Yaris";
			
			$mime_boundary = "toyotayaris";
			$message = "--$mime_boundary\n";
			$message .= "Content-Type: text/html; charset=UTF-8\n";
			$message .= "Content-Transfer-Encoding: 8bit\n\n";			
			$message .= "<html>\n";
			$message .= "<body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:14px; \">\n"; 
			
			$message .='<table  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; border:0px solid #000000; border-collapse:collapse;" width="800" align="center" cellpadding="0" cellspacing="0"><tbody><tr><td>
<table style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" align="center" cellpadding="0" cellspacing="0" width="800"><tbody><tr><td >
            <img src="http://www.shobiztech.com/toyota/img/whatapp_sl.jpg"></td>
            <td style="float:right;"></td></tr></tbody></table></td></tr><tr><td colspan="2" style="height:10px;"></td></tr><tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"></td></tr></tbody></table>';	
			$message .= "<br>\n";
			$message .= "</body>\n";
			$message .= "</html>\n";
			$message .= "--$mime_boundary--\n\n";
			
			$headers = "From:$from\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
			$headerscomm  = "From:toyotayaris@noreply.com\n";
			$headerscomm .= "MIME-Version: 1.0\n";
			$headerscomm .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
			@mail($postData['emmail'], $subject, $message, $headerscomm);
 
}
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