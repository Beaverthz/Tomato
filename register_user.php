<?php

include('dbconnection.php');

$user_name = $_POST["name"];
$address = $_POST["address"];
$user_email = $_POST["email"];
$user_password = $_POST["password"];

$success = 0;
$status = "Active";
$type = 3;
$sql = "INSERT INTO login VALUES (DEFAULT ,'$user_email','$user_password',$type, 0)";
if (!$conn->query($sql) === true) {
    echo "Error: " . $sql  . $conn->error;
    $success = 0;
} else {
    $log_id = mysqli_insert_id($conn);
    $sql2 = "INSERT INTO user_details VALUES (DEFAULT, '$user_name', '$log_id','$address')";
    if (!$conn->query($sql2) === true) {
        echo "Error: " . $sql2 . $conn->error;
        $success = 0;
    } else {
        $success = 1;
    }
}

// if (mysqli_query($conn, $sql)) {
    // $success = 1;
    // $log_id = mysqli_insert_id($conn);
    // $sql2 = "insert into 'user_details' ('log_id', 'name', 'address') values ($log_id,'$user_name','$address')";
    // if (!$conn->query($sql2) === true) {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //     $success = 0;
    // } else {
    //     $success = 1;
    // }
    // if (mysqli_query($conn, $sql)) {
    //     $success = 1;
    // } else {
    //     $success = 0;
    // }
// }
$response["success"] = $success;
die(json_encode($response));
mysql_close($conn);