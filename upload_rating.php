<?php

include './dbconnection.php';

$rating = $_POST["rating"];
$food_id = $_POST["food_id"];
$log_id = $_POST["log_id"];
$date = $_POST["date"];
$book_id = $_POST["book_id"];
$time = $_POST["time"];

$sql = "insert into rating (f_id,rating) values($food_id,$rating)";
$success = 0;
if (mysqli_query($conn, $sql) === TRUE) {
    $sql = "update bookings set sid = 1 where log_id=$log_id and f_id=$food_id and date='$date' and b_id=$book_id and btime='$time'";
    if (mysqli_query($conn, $sql) === TRUE) {
        $success = 1;
    }
}
$response["success"] = $success;
die(json_encode($response));
mysqli_close($conn);

