<?php

include '../dbconnection.php';

$log_id = $_GET["log_id"];
$sql = "select status from login where log_id=$log_id";
$rs = $conn->query($sql);
if ($rs->num_rows > 0) {
while($row =mysqli_fetch_assoc($rs)){
    $status=$row["status"];
if($status==0){
$sql = "update login  set status=1 where log_id = $log_id";
if(mysqli_query($conn, $sql)==TRUE){
    echo '<script>';
    echo "alert('Approved Successfully');";
    echo "location='home.php';";
    echo "</script>";
}else{
    echo '<script>';
    echo "alert('Failed To Approve Hotel');";
    echo "location='home.php';";
    echo "</script>";
}
}
else{
 echo '<script>';
    echo "alert('Already Approved....');";
    echo "location='home.php';";
    echo "</script>";
}
}
}