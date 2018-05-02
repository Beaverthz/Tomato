<?php

include ('dbconnection.php');
$name = $_POST["name"];
$hotel_name = $_POST["hotel_name"];
$description = $_POST["desc"];
$phone = $_POST["phone"];
$pass = $_POST["password"];
$email = $_POST["uname"];
$district = $_POST["district"];
$lat = $_POST['lat'];
$long = $_POST['longi'];
$img_name = $_POST['hotel_img'];
// $img_tmp = $_FILES['hotel_img']['tmp_name'];
// $up = move_uploaded_file($img_tmp,'./img/hotel/'.$img_name);
$sql = "INSERT INTO  `login` (`email`, `password`,`status`) VALUES ('$email','$pass',0)";

if ($conn->query($sql) === TRUE) {
    $log_id = $conn->insert_id;
    $img_db = $img_name;
    $sql = "insert into hotel (log_id,name,phone,hotel_name,hotel_desc,district,image,lat,longi) values($log_id,'$name','$phone','$hotel_name','$description','$district','$img_db','$lat','$long')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo "alert('New Record Inserted Successfully...');";
        echo "location='mail2.php';";
        echo "</script>";
    } else {
        echo '<script>';
        echo "alert('Failed to Insert New Record');";
        echo "location='index.php';";
        echo "</script>";
    }
} else {
    echo '<script>';
    echo "alert('Failed to Insert New Record.Email Already Exists');";
    echo "location='index.php';";
    echo "</script>";
}
?>