<?php
/**
 * Created by Vinay Jaiswal.
 * User: Toyota
 * Date: 26-02-2019
 */

//Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Include database
include '../config/db.php';


/*
 * Admin login function
 */
if(isset($_POST['type']) && $_POST['type']=="AdminLogin")
{
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $query = $db->query("SELECT * FROM `admin` WHERE `email_id` = '$username'");
    $q = $query->num_rows;
    if($q>0)
    {
        $row = mysqli_fetch_array($query);
        if($row['status'] == 'Active')
        {
            if($password == $row['password'])
            {
                $_SESSION['adminloggedin'] = $row['admin_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['email_id'] = $row['email_id'];
                echo json_encode(array(
                    "valid"=>1,
                    "message" => "Logged in successfully"
                ));
            }
            else
            {
                echo json_encode(array(
                    "valid"=>0,
                    "message" => "Incorrect credentials"
                ));
            }
        }
        else
        {
            echo json_encode(array(
                "valid"=>0,
                "message" => "Account not active contact administrator"
            ));
        }
    }
    else
    {
        echo json_encode(array(
            "valid"=>0,
            "message" => "Admin not register with us"
        ));
    }
}


/*
 * Change password
 */
if(isset($_POST['ajax_changepassword']))
{
    $adminid = $_SESSION['adminloggedin'];
    $current_password	= $_POST['ajax_current_password'] ;
    $new_password	= $_POST['ajax_new_password'];
    $confirm_password	= $_POST['ajax_confirm_password'];
    $new_password = encrypt_password($new_password);
    $data = mysqli_fetch_assoc(mysqli_query($db,"select * from admin where `admin_id` = '$adminid'"));
    if (verify_password($current_password, $data['password']))
    {
        $query =  mysqli_query($db,"UPDATE `admin` SET `password`= '$new_password' WHERE `admin_id` = '$adminid'");
        if($query)
        {
            ini_set("SMTP", "smtpout.secureserver.net");//confirm smtp
            $to = $data['admin_email'];
            $from = "";
            $subject = "Wellness Consultant :  Password Changed";
            $body="
                <b style='text-transform:capitalize;'>Dear ".$data['admin_name'].", </b>
                <br>
                <p> You have successfully changed your password</p>
                <br>
                <p>Sincerely</p>
            ";
            //send_mail( $to, $from, $subject, $body );
            send_phpmail( $data['admin_name'], $to ,"", "" , $subject, $body );
            echo json_encode(array(
                "valid"=>1,
                "message" => "Password updated successfully"
            ));
        }
        else
        {
            echo json_encode(array(
                "valid"=>0,
                "message" => "Password Cannot be Updated."
            ));
        }
    }
    else
    {
        echo json_encode(array(
            "valid"=>0,
            "message" => "Current password is incorrect"
        ));
    }
}


/*
 * insert update products
 */
if(isset($_POST['type']) && $_POST['type'] == "AddEditUser")
{
    $msg = '';
    $success = false;
    $data = array();
    extract($_POST);
    $date = date('Y-m-d H:i:s');
    $user_id = '';

    //setting in session
    $full_name = $_POST['full_name'];
    $email_id = isset($_POST['email_id']) ? $_POST['email_id'] : '';
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $location_id = $_POST['location_id'];

    //Validate users
    $check_user = "SELECT * FROM `crew_users` WHERE `email_id` = '$email_id'";
    $sel_user = $db->query( $check_user );
    if($sel_user->num_rows > 0){
        if( $sel_user ){
            $msg  = "Email ID must be unique.";
        }
    }else{
    if (isset($_POST['Record_id']) && !empty($_POST['Record_id'])){
        //update query
        $crew_users_id = $_POST['Record_id'];
        $sql = "UPDATE `crew_users` SET `full_name`= '$full_name', `mobile`= '$mobile', `password`= '$password', `confirm_password`= '$confirm_password',`location_id`='$location_id' WHERE `crew_users_id` = '$crew_users_id'";
        $update = $db->query( $sql );
        if( $update ){
            $success = true;
            $msg  = "Data updated successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }else{
        //insert query
        $sql = "INSERT INTO `crew_users`( `full_name`, `email_id`, `mobile`, `password`, `confirm_password`, `location_id` ) VALUES ( '$full_name', '$email_id', '$mobile', '$password', '$confirm_password', '$location_id' )";
        $insert = $db->query( $sql );
        if( $insert ){
            $crew_users_id = $db->insert_id;
            $success = true;
            $msg  = "Data inserted successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }
    }

    $data = array( 'msg' => $msg, 'success' => $success  );

    echo json_encode($data);
}


//Users Delete
if(isset($_POST["delete_user"]))
{
    $record = $_POST['id'];
    $delrecord = $db->query( "DELETE FROM `crew_users` WHERE `crew_users_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record Deleted successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


//Status Users
if(isset($_POST["status_user"]))
{
    $record = $_POST['id'];
    $status = $_POST['status'];
    $delrecord = $db->query( "UPDATE `crew_users` SET `status`= '$status' WHERE `crew_users_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record updated successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


// Add Location
if(isset($_POST['type']) && $_POST['type']=="AddEditLocation")
{
    $msg = '';
    $success = false;
    $data = array();
    extract($_POST);
    $date = date('Y-m-d H:i:s');

    //setting in session
    $location = $_POST['location'];

    if (isset($_POST['Record_id']) && !empty($_POST['Record_id'])){
        //update query
        $location_id = $_POST['Record_id'];
        $sql = "UPDATE `location_m` SET `location_name`= '$location' WHERE `location_id`='$location_id'";
        $update = $db->query( $sql );
        if( $update ){
            $success = true;
            $msg  = "Data updated successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }else{
        //insert query
        $sql = "INSERT INTO `location_m`(  `location_name` ) VALUES ( '$location' )";
        $insert = $db->query( $sql );
        if( $insert ){
            $success = true;
            $msg  = "Data inserted successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }

    $data = array( 'message' => $msg, 'success' => $success  );

    echo json_encode($data);
}


//Location Delete
if(isset($_POST["delete_location"]))
{
    $record = $_POST['id'];
    $delrecord = $db->query( "DELETE FROM `location_m` WHERE `location_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record Deleted successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


//Status Users
if(isset($_POST["status_location"]))
{
    $record = $_POST['id'];
    $status = $_POST['status'];
    $delrecord = $db->query( "UPDATE `location_m` SET `status`= '$status' WHERE `location_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record updated successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


// Add Location
if(isset($_POST['type']) && $_POST['type']=="AddEditCity")
{
    $msg = '';
    $success = false;
    $data = array();
    extract($_POST);
    $date = date('Y-m-d H:i:s');

    //setting in session
    $city_name = $_POST['city_name'];

    if (isset($_POST['Record_id']) && !empty($_POST['Record_id'])){
        //update query
        $city_id = $_POST['Record_id'];
        $sql = "UPDATE `city_m` SET `city_name`= '$city_name' WHERE `city_id`='$city_id'";
        $update = $db->query( $sql );
        if( $update ){
            $success = true;
            $msg  = "Data updated successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }else{
        //insert query
        $sql = "INSERT INTO `city_m`( `city_name` ) VALUES ( '$city_name' )";
        $insert = $db->query( $sql );
        if( $insert ){
            $success = true;
            $msg  = "Data inserted successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }

    $data = array( 'message' => $msg, 'success' => $success  );

    echo json_encode($data);
}



//Location Delete
if(isset($_POST["delete_cities"]))
{
    $record = $_POST['id'];
    $delrecord = $db->query( "DELETE FROM `city_m` WHERE `city_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record Deleted successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


//Status City
if(isset($_POST["status_city"]))
{
    $record = $_POST['id'];
    $status = $_POST['status'];
    $delrecord = $db->query( "UPDATE `city_m` SET `status`= '$status' WHERE `city_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record updated successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


// Add Location
if(isset($_POST['type']) && $_POST['type']=="AddEditDealer")
{
    $msg = '';
    $success = false;
    $data = array();
    extract($_POST);
    $date = date('Y-m-d H:i:s');

    //setting in session
    $dealer_name = $_POST['dealer_name'];
    $dealer_location = $_POST['dealer_location'];
    $city_id = $_POST['city_id'];
    //$dealer_name = $_POST['Record_id'];

    if (isset($_POST['Record_id']) && !empty($_POST['Record_id'])){
        //update query
        $dealer_id = $_POST['Record_id'];
        $sql = "UPDATE `dealer_m` SET `city_id`= '$city_id', `dealer_name`= '$dealer_name', `dealer_location`= '$dealer_location' WHERE `dealer_id`= '$dealer_id'";
        $update = $db->query( $sql );
        if( $update ){
            $success = true;
            $msg  = "Data updated successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }else{
        //insert query
        $sql = "INSERT INTO `dealer_m`( `city_id`, `dealer_name`, `dealer_location` ) VALUES ( '$city_id', '$dealer_name', '$dealer_location')";
        $insert = $db->query( $sql );
        if( $insert ){
            $success = true;
            $msg  = "Data inserted successfully.";
        }else{
            $msg = "Something went wrong.Please try again later.";
        }
    }

    $data = array( 'message' => $msg, 'success' => $success, 'city_id' => $city_id  );

    echo json_encode($data);
}


//Delete Dealer
if(isset($_POST["delete_dealer"]))
{
    $record = $_POST['id'];
    $delrecord = $db->query( "DELETE FROM `dealer_m` WHERE `dealer_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record Deleted successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}


//Status Dealer
if(isset($_POST["status_dealer"]))
{
    $record = $_POST['id'];
    $status = $_POST['status'];
    $delrecord = $db->query( "UPDATE `dealer_m` SET `status`= '$status' WHERE `dealer_id` = '$record'" );
    if($delrecord)
    {
        echo json_encode(array( "id"=>$record ,"valid"=>true, "msg" => "Record updated successfully" ));
    }
    else
    {
        echo json_encode(array( "valid"=>false, "msg" => "Some Problem Occur, While Deleting." ));
    }
}

$db->close();