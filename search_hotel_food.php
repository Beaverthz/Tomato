<?php

include './dbconnection.php';

$hotel_id = $_POST["hotel_id"];

$sql = "SELECT a.food_name,avg(b.rating) as rating,c.hotel_name,a.price,a.f_id,c.hotel_id FROM"
        . " `food` as a left join rating  as b on a.f_id = b.f_id left join hotel as c on c.log_id =a.log_id"
        . " where c.log_id=$hotel_id group by a.food_name order by rating desc";

$result = array();
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($rs)) {
    array_push($result, array("food_name" => $row[0], "price" => $row[3], "rating" => $row[1]));
}

echo json_encode(array("result"=>$result));