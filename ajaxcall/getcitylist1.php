<?php
include('../config/db.php');
if($_GET['id']) {
$sql = $db->query("SELECT  dealer_id,dealer_name,dealer_location FROM `dealer_m` WHERE city_id='".$_GET['id']."'");
$content = '<select name="city" id="city"><option value="">Select</option>';
while($row =  $sql->fetch_object()) {
$content .= "<option value='".$row->dealer_id."'>".$row->dealer_location."-".$row->dealer_name."</option>";
}
$content .= "</select>";
echo $content;	
}
?>