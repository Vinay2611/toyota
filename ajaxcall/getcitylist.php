<?php
include('../config/db.php');
if(isset($_POST['id']) && !empty($_POST['id'])) {
$sql = $db->query("SELECT  dealer_id,dealer_name,dealer_location FROM `dealer_m` WHERE city_id='".$_POST['id']."'");
$content = '<select name="city" id="city" onchange="edValueKeyPress();"><option value="">Select</option>';
while($row =  $sql->fetch_object()) {
$content .= "<option value='".$row->dealer_id."'>".$row->dealer_location."----".$row->dealer_name."</option>";
}
$content .= "</select>";
echo $content;	
}else{
    $content = '<select name="city" id="city" onchange="edValueKeyPress();"><option value="">Select</option></select>';
    echo $content;
}

$db->close();
?>