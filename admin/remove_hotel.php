<?php

include '../dbconnection.php';

$log_id = $_GET["log_id"];

$sql = "delete from login where log_id = $log_id";
if(mysqli_query($conn, $sql)==TRUE){
    echo '<script>';
    echo "alert('Removed Successfully');";
    echo "location='home.php';";
    echo "</script>";
}else{
    echo '<script>';
    echo "alert('Failed To Remove Hotel');";
    echo "location='home.php';";
    echo "</script>";
}

