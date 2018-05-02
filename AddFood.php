<?php
session_start();
include ('dbconnection.php');

$food = $_POST["food"];
$desc = $_POST["description"];
$price = $_POST["price"];
$img_name = $_POST['f_image'];
$img_tmp = $_FILES['f_image']['tmp_name'];
$ext = strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
if($ext=='jpg'||$ext=='jpeg'||$ext=='png'||$ext=='gif')
{
    // echo move_uploaded_file($img_tmp,'img/food/'.$img_name);
$log_id = $_SESSION["log_id"];

$query = "select * from food where food_name = '$food' and log_id = '$log_id'";
$rs = mysqli_query($conn, $query);
if ($rs->num_rows == 0) {
$gst=(18/100)*$price;
$price=$price+$gst;
$pr=round($price);
$img_db= $img_name;
    $sql = "insert into food (log_id,food_name,description,price,f_image) values($log_id,'$food','$desc','$pr','$img_db')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo "alert('New Food Inserted Successfully..');";
        echo "location='Home.php';";
        echo "</script>";
    } else {
        echo '<script>';
        echo "alert('Error Occured');";
        echo "location='Home.php';";
        echo "</script>";
    }
} else {
    echo '<script>';
    echo "alert('Food Item Already Exists...');";
    echo "location='Home.php';";
    echo "</script>";
}

}
else
{
    ?><script>
        alert("invalid image format!Please try again");
        setTimeout(function(){window.location.href='home.php'},1000);
    </script> <?php
}
echo $log_id;