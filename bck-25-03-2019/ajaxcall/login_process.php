<?php
include('../config/db.php');
$postData = $_POST;
if($postData) {
$username = $postData['username'];
$password = $postData['password'];
$query = $db->query("SELECT crew_users_id,full_name,location_id FROM crew_users WHERE email_id='".$username."' AND password='".$password."' AND status='Approved'");
$result = $query->fetch_object();
$row_cnt = $query->num_rows;
	
	if($row_cnt == 1) {
	$locationQuery = $db->query("SELECT location_name FROM `location_m` WHERE location_id='".$result->location_id."'");	
	$locationResult = $locationQuery->fetch_object();
	//Save session
	$_SESSION['users_id'] = $result->crew_users_id;
	$_SESSION['first_name'] = $result->full_name;
	$_SESSION['location_id'] = $result->location_id;
	$_SESSION['location_name'] = $locationResult->location_name;
	//Save cookies	
	setcookie('users_id', $result->crew_users_id, time() + 53200);
	setcookie('first_name', $result->full_name, time() + 53200);
	setcookie('location_id', $result->location_id, time() + 53200);
	setcookie('location_name', $locationResult->location_name, time() + 53200);
	$response = array('logged' => true);
	} else {
	$response = array('logged' => false,'message'=>'Please enter valid Username & password');	
	}
    print_r(json_encode($response));
}

$db->close();
?>