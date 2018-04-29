<?php
try{
$con = new PDO("mysql:host=localhost;dbname=foodapp","root","root");
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
