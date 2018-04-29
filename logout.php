<?php
session_start();
session_unset(); 

// destroy the session 
session_destroy(); 
header('Location:index.php');
//header('Location: ' . 'index.php', true, $permanent ? 301 : 302);

?>