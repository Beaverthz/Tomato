<?php

include './dbconnection.php';

$log_id = $_POST["log_id"];
$combo_id = $_POST["combo_id"];
$booking_date = $_POST["date"];
$no_of_persons = $_POST["num"];
$type = $_POST["type"];
$time = $_POST["time"];

$t=1;
if($type !== "t"){
    $t = 2;
}

$success = 0;
$sql = "insert into combo_bookings (log_id,combo_id,date,count,type,btime) values('$log_id','$combo_id','$booking_date','$no_of_persons','$t','$time')";
if($conn->query($sql)===TRUE){
    $success = 1;
}else{
    echo 'Error';
}
$response["success"] = $success;
die(json_encode($response));
mysqli_close($conn);
