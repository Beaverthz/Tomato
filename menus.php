<?php
require_once 'dbconnection1.php';
$hotel_id = htmlspecialchars($_POST['hotel_id']);
$disp = $con->prepare('select food.f_id,food.food_name as food,food.price,truncate(avg(rating.rating),2) as rating,hotel.hotel_id,hotel.hotel_name as hotel,hotel.hotel_desc as address,hotel.phone,food.f_image from hotel left join food on hotel.log_id = food.log_id left join rating on food.f_id = rating.f_id where hotel.hotel_id=? group by food.food_name order by rating desc');
$a = array($hotel_id);
if($disp->execute($a))
{
    $disp->setFetchMode(PDO::FETCH_ASSOC);
    $r = $disp->fetchAll();
    $a =array("result"=>$r);
    echo json_encode($a);
}