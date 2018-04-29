<?php

include './dbconnection.php';

$log_id = $_POST["log_id"];

$sql = "select a.f_id,a.food_name,a.price,b.hotel_name,c.b_id,c.date,c.count,c.btime,d.type,c.status,a.f_image from bookings as c join food as a on c.f_id = a.f_id "
."join hotel as b on a.log_id = b.log_id join booking_type as d on c.type = d.type_id where c.log_id = '$log_id' and c.sid = 2";

$rs = mysqli_query($conn, $sql);
$result = array();
if($rs->num_rows > 0){
    while($row = mysqli_fetch_assoc($rs)){
        array_push($result, array("fid"=>$row["f_id"],"food_name"=>$row["food_name"],"price"=>$row["price"],"hotel_name"=>$row["hotel_name"],"bid"=>$row["b_id"],"date"=>$row["date"],"count"=>$row["count"],"time"=>$row["btime"],"type"=>$row["type"],"status"=>$row["status"],"f_image"=>$row['f_image']));
    }
}
die(json_encode(array("result"=>$result)));