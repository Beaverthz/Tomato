<?php

include './dbconnection.php';

$price = $_POST["price"];
$district = $_POST["district"];

$sql = "SELECT a.combo_name,avg(b.rating) as rating,c.hotel_name,a.price,a.combo_id,c.hotel_id,c.hotel_desc,c.phone FROM"
 ." `combo` as a left join combo_rating as b on a.combo_id = b.combo_id left join hotel as c on c.log_id =a.log_id where a.price<=$price and c.district='$district'"
 ." group by a.combo_name order by rating desc";

$rs = mysqli_query($conn, $sql);
$result = array();
    while($row = mysqli_fetch_array($rs))
    {
        array_push($result, array("combo"=>$row[0],"rating"=>$row[1],"hotel"=>$row[2],"price"=>$row[3],"combo_id"=>$row[4],"hotel_id"=>$row[5],"address"=>$row[6],"phone"=>$row[7]));
    }
    
    echo json_encode(array("result"=>$result));