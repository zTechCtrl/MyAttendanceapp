<?php
$hostName = "localhost";
$dbUser = "root";
$Password = "";
$dbName = "s_attendance_db";

$conn = mysqli_connect($hostName,$dbUser,$Password,$dbName );

if(!$conn){
die("Something went wrong");
}
?>