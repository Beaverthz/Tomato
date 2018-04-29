<?php
$b_id=$_GET["bid"];

 include ('dbconnection.php');

$sql = "select status from combo_bookings where cb_id=$b_id";
$rs = $conn->query($sql);
if ($rs->num_rows > 0) {
while($row =mysqli_fetch_assoc($rs)){
    $status=$row["status"];
if($status==0){
$quer="update combo_bookings set status=1 where cb_id=$b_id";
if ($conn->query($quer) === TRUE) {
  echo '<script>';
        echo "alert('Combo Order placed  Successfully...');";
        echo "location='Bookings.php';";
        echo "</script>";
    } else {
        echo '<script>';
        echo "alert('Failed to place combo order');";
        echo "location='Bookings.php';";
        echo "</script>";
    }
}
else{
 echo '<script>';
        echo "alert('This order is already placed');";
        echo "location='Bookings.php';";
        echo "</script>";
}
}
}
?>