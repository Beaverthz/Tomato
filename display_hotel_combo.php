<?php
require_once 'dbconnection1.php';
$hotel_id = htmlspecialchars($_POST['hotel_id']);
$disp = $con->prepare("select combo.combo_id,combo.combo_name,combo.price,combo_rating.rating,hotel.hotel_id,hotel.hotel_desc as address,hotel.phone,combo.combo_image from hotel left join combo on hotel.log_id = combo.log_id left join combo_rating on combo.combo_id = combo_rating.combo_id where hotel.hotel_id = ?");
if($disp->execute(array($hotel_id)))
{
    $disp->setFetchMode(PDO::FETCH_ASSOC);
    $r = $disp->fetchAll();
    $a = array("result"=>$r);
    echo json_encode($a);
}