<?php
session_start();
include './dbconnection.php';

$combo = $_POST["combo"];
$price = $_POST["price"];
$combo_name = $_POST["combo_name"];
$hotel_name = $_SESSION["hotel_name"];
$c_image = $_FILES['c_image']['name'];
$c_tmp = $_FILES['c_image']['tmp_name'];
echo move_uploaded_file($c_tmp,'./img/combo/'.$c_image);
$c_image_db = 'https://alexanto.000webhostapp.com/foodapp/img/combo/'.$c_image;
$log_id = $_SESSION["log_id"];
 $hotel_name = $_SESSION["hotel_name"];
$success = 0;
$gst=(18/100)*$price;
$price=$price+$gst;
$pr=round($price);
$sql = "insert into combo (log_id,combo_name,price,combo_image) values('$log_id','$combo_name','$pr','$c_image_db')";
if ($conn->query($sql) == TRUE) {
    $id = mysqli_insert_id($conn);
    $food_items = explode(",", $combo);
    for ($i = 0; $i < sizeof($food_items) - 1; $i++) {
        $food = $food_items[$i];
        $details = explode("-", $food);
        $sql = "insert into combo_items(combo_id,food_name,num) values('$id','$details[0]','$details[1]')";
        if ($conn->query($sql) == TRUE) {

            $success = 1;

}else{
    $success = 0;
}
    }
}

if ($success === 1) {
$que="select email from login  WHERE type_id=3";
$rs = $conn->query($que);
if ($rs->num_rows > 0) {
while($row =mysqli_fetch_assoc($rs)){
$sender=$row["email"];
if(mail($sender,"Combo Offer","Hey....Today's combo offer in  " .$hotel_name. " is ".$combo_name."  ".$price."  for the food item".$food)){
echo "message sent";
}
else{
echo "failed to sent";
}



        } 
    }

    echo '<script>';
    echo "alert('Combo Inserted Successfully...');";
    echo "location='Home.php';";
    echo "</script>";
}else{
    echo '<script>';
    echo "alert('Failed to add');";
    echo "location='Home.php';";
    echo "</script>";
}