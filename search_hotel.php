<?php
include './dbconnection1.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $lat = htmlspecialchars($_POST['latitude']);
    $long = htmlspecialchars($_POST['longitude']);
    $r = 1;
    $res = $con->prepare("select hotel_id as hid,hotel_name,image as hotel_image,hotel_desc as haddress,phone as hphone from hotel where lat >=? and lat <=? and longi >=? and longi<= ?");
    $a = array(($lat-$r),($lat+$r),($long-$r),($long+$r));
    echo $a;
    if($res->execute($a))
    {
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $r = $res->fetchAll();
        $d = array('hotels'=>$r);
        echo json_encode($d);
    }
}

// include './dbconnection.php';

// if($_SERVER['REQUEST_METHOD']==='POST')
// {
//     $lat = htmlspecialchars($_POST['latitude']);
//     $longi = htmlspecialchars($_POST['longitude']);
//     $r = 0.1;
//     $sql = "select * from hotel where lat >='".($lat-$r)."' and lat<='".($lat+$r)."' and longi>='".($longi-$r)."' and longi<='".($longi+$r)."'";
//     $rs = mysqli_query($conn,$sql);
//     $hotels = array();
//     $row =mysqli_fetch_array($rs);
//     print_r($row);
//     while($row = mysqli_fetch_array($rs))
//     {
//         array_push($hotels,array("hid"=>$row['hotel_id'],"hotel_name"=>$row['hotel_name'],'hotel_image'=>$row['image'],'haddress'=>$row['hotel_desc'],'hphone'=>$row['phone']));
//     }
//     echo json_encode(array("result"=>$hotels));
// }
//$sql = "select log_id,hotel_name from hotel";
//
//$rs = mysqli_query($conn, $sql);
//$result = array();
//while($row = mysqli_fetch_array($rs)){
//    array_push($result, array("log_id"=>$row[0],"hotel"=>$row[1]));
//}
//echo json_encode(array("result"=>$result));
//
