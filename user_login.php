<?php

include ('dbconnection.php');

$email = $_POST["email"];
$password = $_POST["password"];

$success = 0;
$id = 0;
$name = "";
$sql = "select * from login where email = '$email' and password = '$password' and type_id=3";
$rs = $conn->query($sql);
if ($rs->num_rows > 0) {
    while ($row = $rs->fetch_assoc()) {
        $id = $row["log_id"];
        $s = "select name from user_details where log_id = $id";
        $r = $conn->query($s);
        $result = $r->fetch_assoc();
        $name = $result["name"];
        $success = 1;
    }
} else {
    $success = 0;
}
$response["success"] = $id."#".$name;
die(json_encode($response));
mysqli_close($conn);