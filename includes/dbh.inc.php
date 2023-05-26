<?php

$serverName = "localhost:3307";
$dBUserName = "root";
$dBPpassword = "";
$dBName = "FPWebshop";

$conn = mysqli_connect($serverName, $dBUserName, $dBPpassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}