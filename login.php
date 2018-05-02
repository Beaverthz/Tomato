<?php

include ('dbconnection.php');

ob_start();
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from login where email = '$email' and password = '$password'";
$rs = $conn->query($sql);
if ($rs->num_rows > 0) {
    $row = $rs->fetch_assoc();
    $id = $row["log_id"];
    $status=$row["status"];
    $_SESSION["log_id"] = $id;
    $type_id = $row["type_id"];
    if ($type_id == 1) {
        header('location:admin/home.php');
        exit;
    }
//      else if($status==0) {
// echo '<script>';
//     echo "alert('You cant login right now,You can only login after Admin approves you...');";
//     echo "location='index.php';";
//     echo "</script>";
// }
else {
        $query = "select hotel_name from hotel where log_id = '$id'";
        $rs = mysqli_query($conn, $query);
        $r = $rs->fetch_assoc();
        $hotel_name = $r["hotel_name"];

        $_SESSION["hotel_name"] = $hotel_name;
        echo '<script>';
        echo "location='Home.php';";
        echo "</script>";
        $url = "Home.php";
      //  header("Location: Home.php");
        exit;
    }
} else {
    echo '<script>';
    echo "alert('Login Failed...');";
    echo "location='index.php';";
    echo "</script>";
}
?>
