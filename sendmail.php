<?php
include ('dbconnection.php');
echo "sendmail";
$id=$_POST["id"];
//echo $id;
// the message
$msg = "hiii how are you";

// use wordwrap() if lines are longer than 70 characters


// send email
$que="select email from login as l join hotel WHERE log_id=$id and user_type=3";
$rs = $conn->query($que);
if ($rs->num_rows > 0) {
while($row =mysqli_fetch_assoc($rs)){
    
$sender=$row["email"];

$query1="select l.email from bookings as b JOIN hotel as h on b.user_id=h.hotel_id JOIN login as l on l.log_id=b.log_id where l.type_id=3 and h.hotel_id=$hotel_id";
$rs = mysqli_query($conn,$query1);
if($rs->num_rows>0)
{
    while($row = mysqli_fetch_assoc($rs))
    {
       
$sender=$row["email"];
if(mail($sender,"Combo Offer","Hey....Today's Combo offer")){
echo "message sent";
}
else{
echo "failed to sent";
}
}
}
}
}




?>