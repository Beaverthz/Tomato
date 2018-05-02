<?php session_start();
if(!isset($_SESSION['log_id']))
{
header("Location:./index.php");
}
?><!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tomato | Management System</title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


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

                <ul class="nav navbar-nav navbar-header">
                  <li>
                    <br>
                    <img src="img/tomato.jpg" alt="" height="42" width="auto">
                  </li>
                </ul>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <br>
                        <li>
                            <a class="page-scroll" href="Home.php">Home</a>
                        </li>
                        <?php

                        $hotel_name = $_SESSION["hotel_name"];
                        echo "<li>";
                        echo "<a class='page-scroll' href='logout.php'>Logout  ($hotel_name)</a>";
                        echo "</li>";
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
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
                    <div class="col-lg-6">
                        <div class="panel">
                            <h3><b>Add Food Items</b></h3>
                            <form action="AddFood.php" method="POST" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label>Name of Food</label>
                                    <input type="text" class="form-control" name="food" required=""/>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" required=""/>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input placeholder="image link" type="text" class="form-control" name="f_image" required=""/>
                                </div>
                                <input type="submit" class="btn btn-warning" value="Add Food"/>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h3>Food Added So Far</h3>
                    <?php
                    $rs = $conn->query($sql);
                    if ($rs->num_rows > 0) {
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <th>No</th>
                            <th>Food</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                            </thead>
                            <?php
                            $c = 1;
                            while ($row = $rs->fetch_assoc()) {
                                $food = $row["food_name"];
                                $description = $row["description"];
                                $price = $row["price"];
                                $f_id = $row["f_id"];
                                echo '<tbody>';
                                echo "<tr><td>$c</td>";
                                echo "<td>$food</td>";
                                echo "<td>$description</td>";
                                echo "<td>$price</td>";
                                echo "<td><img src='".$row['f_image']."' width='100' height='100' alt='food image'></td>";
                                echo "<td><a href='remove_food.php?f_id=$f_id'>Remove</a></td></tr>";
                                echo '<tbody>';
                                $c++;
                            }
                            ?>
                        </table>
                        <?php
                    } else {

                    }
                    ?>
                </div>
            </div>
        </div>



        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <!--<script src="js/contact_me.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="js/agency.js"></script>

    </body>

</html>
