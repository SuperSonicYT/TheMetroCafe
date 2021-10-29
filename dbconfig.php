<?php
    session_start();

    $host="localhost";
    $user="root";
    $password="";
    $dbname="TheMetroCafe";

    $conn=mysqli_connect($host,$user,$password,$dbname);
    if(!$conn) {
        die("connection failed :" .mysqli_connect_error());
    }
?>