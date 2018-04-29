<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";

// $con = mysqli_connect("localhost","root","root","abid");
$conn = new mysqli($servername, $username, $password, 'foodapp');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
