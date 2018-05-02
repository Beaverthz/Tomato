<?php session_start(); ?>
<html>
 <head>
    <title>FoodHut | Rating</title>

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
    ?>
    <div style="padding-top: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Food Rating</h3>
                    <table class="table table-bordered">
                        <thead>
                        <th>No</th>
                        <th>Food Name</th>
                        <th>Rating</th>
                        </thead>
                        <?php
                        $sql = "SELECT a.food_name,truncate(avg(b.rating),2) from food as a join rating as b on a.f_id = b.f_id where a.log_id = $log_id group by a.food_name";
                        $rs = mysqli_query($conn, $sql);
                        $c = 1;
                        while ($row = mysqli_fetch_array($rs)) {
                            $food_name = $row[0];
                            $rating = $row[1];
                            echo "<tr><td>$c</td><td>$food_name</td><td>$rating</td></tr>";
                            $c++;
                        }
                        ?>
                    </table>
                </div>
                <div class="col-lg-6">
                    <h3>Combo Rating</h3>
                    <table class="table table-bordered">
                        <thead>
                        <th>No</th>
                        <th>Combo Name</th>
                        <th>Rating</th>
                        </thead>
                        <?php
                        $sql1 = "SELECT a.combo_name,truncate(avg(b.rating),2) from combo as a join combo_rating as b on a.combo_id = b.combo_id where a.log_id = $log_id group by a.combo_name";
                        $rs1 = mysqli_query($conn, $sql1);
                        $c1 = 1;
                        while ($row = mysqli_fetch_array($rs1)) {
                            $food_name = $row[0];
                            $rating = $row[1];
                            echo "<tr><td>$c1</td><td>$food_name</td><td>$rating</td></tr>";
                            $c1++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
