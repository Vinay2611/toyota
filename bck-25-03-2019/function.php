<?php
function fetchUserId() {
 $users_id = "";
 if($_COOKIE['users_id']) {
 $users_id = $_COOKIE['users_id'];
 } else if($_SESSION['users_id']) {
 $users_id = $_SESSION['users_id'];
 }
 return $users_id;
 }
 
 function fetchLocationId() {
 $location_id = "";
 if($_COOKIE['location_id']) {
 $location_id = $_COOKIE['location_id'];
 } else if($_SESSION['location_id']) {
 $location_id = $_SESSION['location_id'];
 }
 return $location_id;
 }
 ?>