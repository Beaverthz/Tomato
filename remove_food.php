<?php

include './dbconnection.php';
$f_id = $_GET["f_id"];
$sql = "delete from food where f_id = $f_id";
if(mysqli_query($conn, $sql)==TRUE){
    echo '<script>';
    echo "alert('Removed Successfully');";
    echo "location='Home.php';";
    echo "</script>";
}else{
    echo '<script>';
    echo "alert('Failed to Remove...');";
    echo "location='Home.php';";
    echo "</script>";
}

