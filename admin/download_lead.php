<?php

//database connection
require_once '../config/db.php';

if ((isset($_GET['lead']) && !empty($_GET['lead'])) && (isset($_GET['location']) && !empty($_GET['location']))){
    $lead = $_GET['lead'];
    $location = $_GET['location'];
}
if ($lead == 'All'){
    $sql = "SELECT cu.full_name,cu.email_id,cu.mobile,lm.location_name,f.name,f.mobile,f.email_id,f.age,f.gender,f.pincode,f.occupation,f.own_car,f.car_brand,f.car_model,f.car_age,f.car_purchase_plan,f.nearest_dealership,f.dateTime,f.city_id,f.drive_image FROM `feedback` as f join crew_users as cu on f.crew_user_id = cu.crew_users_id join location_m as lm on lm.location_id = cu.location_id WHERE lm.location_id = '$location'";
}else{
    $sql = "SELECT cu.full_name,cu.email_id,cu.mobile,lm.location_name,f.name,f.mobile,f.email_id,f.age,f.gender,f.pincode,f.occupation,f.own_car,f.car_brand,f.car_model,f.car_age,f.car_purchase_plan,f.nearest_dealership,f.dateTime,f.city_id,f.drive_image FROM `feedback` as f join crew_users as cu on f.crew_user_id = cu.crew_users_id join location_m as lm on lm.location_id = cu.location_id WHERE lm.location_id = '$location' AND f.car_purchase_plan = '$lead'";
}
$que = $db->query( $sql );
$data_array = array();

$dealer = "";
if($que->num_rows > 0) {
    $i = 0;
    $developer_records[] = array( 'Sr No', 'User Name', 'User Email', 'Location', 'Customer Name', 'Customer Email', 'Mobile', 'Age', 'Gender', 'City', 'Dealers', 'Pincode', 'Occupation', 'Next car purchase plan', 'Own a car', 'Brand', 'Car', 'How old is your vehicle?', 'Driving Licence', 'DateTime' );

    while ($row = $que->fetch_assoc()) {
        $i++;
		$drive_image = "";
        //Driving licence
        if(!empty($row['drive_image'])){
            $drive_image = "http://www.shobiztech.com/toyota/uploads/".$row['drive_image'];
        }
        //Dealer name
        $dealer = $row['nearest_dealership'];
        $dealer_name = explode("----", $dealer);
        $developer_records[] = array( $i ,$row['full_name'], $row['email_id'], $row['location_name'], $row['name'], $row['email_id'] ,$row['mobile'], $row['age'], $row['gender'], $row['city_id'], $dealer_name[1],$row['pincode'], $row['occupation'], $row['car_purchase_plan'], $row['own_car'], $row['car_brand'],$row['car_model'], $row['car_age'], $drive_image, $row['dateTime'] );
    }
}else{
    echo '<script>window.location.href = "hot_warm_lead.php";</script>';
}

$filename = "export_".date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel; charset=UTF-8; encoding=UTF-8");
header("Content-Disposition: attachment; filename=\"$filename\"");
$show_coloumn = false;
if(!empty($developer_records)) {
    foreach($developer_records as $record) {
        if(!$show_coloumn) {
            // display field/column names in first row
            //echo implode("\t", array_keys($record)) . "\n";
            $show_coloumn = true;
        }
        echo implode("\t", array_values($record)) . "\n";
        //echo implode("\t", array_values($record)) . "\n";
    }
}

$db->close();
exit;

?>

