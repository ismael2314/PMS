<?php
    error_reporting(0);
    // server connection
    $host = "localhost";
    $user = "root";
    $pass = ""; 
    $db = "pm_db";

    $conn = mysqli_connect($host,$user,$pass,$db) or die ("Connection to the server has failed !");

    $data = array();
    

?>