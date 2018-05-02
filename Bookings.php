<?php session_start();
?><html>
<head>
<title>FoodHut | Orders</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/home.css" rel="stylesheet" type="text/css"/>
<!--<link href="css/agency.css" rel="stylesheet">-->
<script src="js/jquery-3.2.0.min.js" type="text/javascript"></script>
<script src="js/myjs.js" type="text/javascript"></script>
<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Home.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Bookings.php">Orders</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="check_food_rating.php">Rating</a>
                    </li>
                    <?php

                        $hotel_name = $_SESSION["hotel_name"];
                        echo "<li>";
                        echo "<a class='page-scroll' href='logout.php'>Logout($hotel_name)</a>";
                        echo "</li>";
                        ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    session_start();
    $log_id = $_SESSION["log_id"];
    include ('dbconnection.php');
    $sql = "select * from food where log_id = $log_id";
    ?>
    <div style="padding-top: 80px;">
        <div class="container">
            <div class="row">
                <h3>Bookings</h3>
                <?php
                $sql = "SELECT a.name,a.address,b.food_name,c.hotel_name,d.type,x.date,x.count,x.b_id,x.status as order_status from bookings as x join user_details as a on x.log_id = a.log_id join"
                        . " food as b on x.f_id = b.f_id join hotel as c on c.log_id = b.log_id join booking_type as d on x.type=d.type_id where c.log_id = $log_id";
                $rs = mysqli_query($conn, $sql);
                ?>
                <table class="table table-bordered">
                    <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>ordered Food</th>
                    <th>Date</th>
                    <th>Count</th>
                    <th>Type</th>
 <th>Action</th>
                    </thead>
                    <?php
                    $c = 1;
                    while ($row = mysqli_fetch_array($rs)) {
                        $name = $row[0];
                        $address = $row["address"];
                        $food_name = $row[2];
                        $type = $row["type"];
                        $no = $row["count"];
                        $date = $row["date"];
                         $bid = $row["b_id"];
                        echo "<tr><td>$c</td><td>$name</td><td>$address</td><td>$food_name</td><td>$date</td><td>$no</td><td>$type</td>";
                        echo "<td>";
                        if($row['order_status']==1){
                         echo "<a href='placeorder.php?bid= ".$bid."&type=".$type."' style='color:green;font-weight:bold'>Order Placed</a></td></tr>";
                        }
                        else
                        {
                            echo "<a href='placeorder.php?bid= ".$bid."&type=".$type."'>Place Order</a></td></tr>";
                        }

                        $c++;
                    }
                    ?>
                </table>
                <h3>Combo Bookings</h3>
                <table class="table table-bordered">
                    <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>ordered Food</th>
                    <th>Date</th>
                    <th>Count</th>
                    <th>Type</th>
                    <th>Action</th>
                    </thead>
                <?php
                $sql = "SELECT a.name,b.combo_name,c.hotel_name,d.type,x.date,x.count,x.cb_id,x.status from combo_bookings as x join user_details as a on x.log_id = a.log_id join"
                        . " combo as b on x.combo_id = b.combo_id join hotel as c on c.log_id = b.log_id join booking_type as d on x.type=d.type_id where c.log_id = $log_id";
                $rs1 = mysqli_query($conn, $sql);
                $c1 = 1;
                while ($row = mysqli_fetch_array($rs1)) {
                    $name = $row[0];
                    $food_name = $row[1];
                    $type = $row["type"];
                    $no = $row["count"];
                    $date = $row["date"];
$bkid=$row["cb_id"];
                    echo "<tr><td>$c1</td><td>$name</td><td>$food_name</td><td>$date</td><td>$no</td><td>$type</td>";
                    echo "<td>";
                    if($row['status']==1){
                    echo "<a href='comboplaceorder.php?bid= ".$bkid."' style='color:green;font-weight:bold'>Order Placed</a></td></tr>";
                    }
                    else{
                     echo "<a href='comboplaceorder.php?bid= ".$bkid."' >Place Order</a></td></tr>";
                    }
                    $c1++;
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</body>
