<?php
include('../config/db.php');
if($_GET['id']) {
$sql = $db->query("SELECT car_id,car_name FROM `brandtocar` WHERE brand_id='".$_GET['id']."'");
$content = '<select name="carmodelid1" id="carmodelid1" onchange="setcarmodelid1(this.value)"><option value="">Select</option>';
while($row =  $sql->fetch_object()) {
$content .= "<option value='".$row->car_id."'>".$row->car_name."</option>";
}
$content .= "</select>";
echo $content;	
}else{
    $content = '<select name="carmodelid1" id="carmodelid1" onchange="setcarmodelid1(this.value)"><option value="">Select</option>';
    echo $content;
}
$db->close();
?>