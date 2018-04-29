<?php

include('dbconnection.php');

$user_name = $_POST["name"];

$user_password = $_POST["password"];

$success = 0;
$status = "Active";
$type = 3;
$sql = "update  login set password='$user_password' where email='$user_name'";

if (mysqli_query($conn, $sql)) {
    $success = 1;
    
}
else{
 $success = 0;
}
$response["success"] = $success;
die(json_encode($response));
mysql_close($conn);