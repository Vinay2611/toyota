<?php
include('../config/db.php');
if($_GET['id']) {
$sql = $db->query("SELECT car_id,car_name FROM `brandtocar` WHERE brand_id='".$_GET['id']."'");
$content = '<select name="carmodelid1" id="carmodelid1"><option value="">Select</option>';
while($row =  $sql->fetch_object()) {
$content .= "<option value='".$row->car_id."'>".$row->car_name."</option>";
}
$content .= "</select>";
echo $content;	
}
$db->close();
?>