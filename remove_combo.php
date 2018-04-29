<?php

include './dbconnection.php';
$combo_id = $_GET["combo_id"];
$sql = "delete from combo where combo_id = $combo_id";
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

