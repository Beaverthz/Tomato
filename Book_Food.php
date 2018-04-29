<?php

include './dbconnection.php';

$log_id = $_POST["log_id"];
$food_id = $_POST["food_id"];
$booking_date = $_POST["date"];
$no_of_persons = $_POST["num"];
$type = $_POST["type"];
$time = $_POST["time"];
$hotel_id = $_POST["hotel_id"];

$t=1;
if($type !== "t"){
    $t = 2;
}

$success = 0;
$sql = "insert into bookings (log_id,f_id,date,count,type,btime,user_id) values('$log_id','$food_id','$booking_date','$no_of_persons','$t','$time','$hotel_id')";
if($conn->query($sql)===TRUE){
    $success = 1;
}else{
    echo 'Error';
}
$response["success"] = $success;
die(json_encode($response));
mysqli_close($conn);