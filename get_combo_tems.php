<?php

include './dbconnection.php';

$combo_id = $_POST["combo_id"];

$sql = "SELECT food_name,num FROM `combo_items` where combo_id = $combo_id";

$rs = mysqli_query($conn, $sql);
$result = array();
if($rs->num_rows > 0){
    while($row = mysqli_fetch_array($rs)){
        array_push($result, array("combo_item"=>$row[0],"count"=>$row['num']));
    }
}

echo json_encode(array("result"=>$result));