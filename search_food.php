<?php

include './dbconnection.php';

$food_name = $_POST["food"];
$district = $_POST["district"];

$sql = "SELECT a.food_name,truncate(avg(b.rating),2) as rating,c.hotel_name,a.price,a.f_id,c.hotel_id,c.hotel_desc,c.phone FROM `food` as a left join rating "
        . " as b on a.f_id = b.f_id left join hotel as c on c.log_id =a.log_id where food_name like '%$food_name%' and c.district='$district'"
        . " group by a.f_id order by rating desc";

$rs = mysqli_query($conn, $sql);
$result = array();
    while($row = mysqli_fetch_array($rs))
    {
        array_push($result, array("food"=>$row[0],"rating"=>$row[1],"hotel"=>$row[2],"price"=>$row[3],"f_id"=>$row[4],"hotel_id"=>$row[5],"address"=>$row[6],"phone"=>$row[7]));
    }
    
    echo json_encode(array("result"=>$result));