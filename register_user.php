<?php

include('dbconnection.php');

$user_name = $_POST["name"];
$address = $_POST["address"];
$user_email = $_POST["email"];
$user_password = $_POST["password"];

$success = 0;
$status = "Active";
$type = 3;
$sql = "INSERT INTO `login`(`email`,`password`,`type_id`) VALUES ('$user_email','$user_password',$type)";

if (mysqli_query($conn, $sql)) {
    $success = 1;
    $log_id = mysqli_insert_id($conn);
    $sql = "insert into `user_details` (`log_id`, `name`, `address`) values($log_id,'$user_name','$address')";
    if (mysqli_query($conn, $sql)) {
        $success = 1;
    } else {
        $success = 0;
    }
}
$response["success"] = $success;
die(json_encode($response));
mysql_close($conn);