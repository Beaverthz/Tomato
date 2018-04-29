<?php
require_once 'dbconnection1.php';

$disp = $con->prepare("select hotel_id,hotel_name as hotel from hotel");
if($disp->execute())
{
    $disp->setFetchMode(PDO::FETCH_ASSOC);
    $r = $disp->fetchAll();
    $a = array('result'=>$r);
    echo json_encode($a);
}
?>