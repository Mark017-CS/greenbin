<?php
session_start();
error_reporting(0);

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greenbin";

$db = mysqli_connect($server, $username,  $password, $dbname) or die("databse not connected!")
    ?>