<?php

include './dbconnection.php';

$rating = $_POST["rating"];
$combo_id = $_POST["combo_id"];
$log_id = $_POST["log_id"];
$date = $_POST["date"];
$cb_id = $_POST["cb_id"];
$time = $_POST["time"];

$sql = "insert into combo_rating (combo_id,rating) values($combo_id,$rating)";
$success = 0;
if (mysqli_query($conn, $sql) === TRUE) {
    $sql = "update combo_bookings set sid = 1 where log_id=$log_id and combo_id=$combo_id and date='$date' and cb_id=$cb_id and btime='$time'";
    if (mysqli_query($conn, $sql) === TRUE) {
        $success = 1;
    }
}
$response["success"] = $success;
die(json_encode($response));
mysqli_close($conn);

