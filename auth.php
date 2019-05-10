<?php 
if(($_SESSION['users_id'] == "") && ($_COOKIE['users_id'] == "")) {
echo "<script>window.location='index.php'</script>";	
}
?>	