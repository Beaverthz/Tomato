<?php

include './dbconnection.php';

$log_id = $_POST["log_id"];

$sql = "select c.status,a.combo_id,a.combo_name,a.price,b.hotel_name,c.cb_id,c.date,c.count,c.btime,d.type,a.combo_image,b.hotel_id from"
 ." combo_bookings as c join combo as a on c.combo_id = a.combo_id join hotel as b on a.log_id = b.log_id join"
 ." booking_type as d on c.type = d.type_id where c.log_id = $log_id and c.sid = 2";

$rs = mysqli_query($conn, $sql);
$result = array();
if($rs->num_rows > 0){
    while($row = mysqli_fetch_assoc($rs)){
        array_push($result, array("combo_id"=>$row["combo_id"],"combo_name"=>$row["combo_name"],"price"=>$row["price"],"hotel_name"=>$row["hotel_name"],"cb_id"=>$row["cb_id"],"date"=>$row["date"],"count"=>$row["count"],"time"=>$row["btime"],"type"=>$row["type"],"status"=>$row["status"],"combo_image"=>$row['combo_image'],'hotel_id'=>$row['hotel_id']));
    }
}
die(json_encode(array("result"=>$result)));