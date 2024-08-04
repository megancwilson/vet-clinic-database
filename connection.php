<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vet_appt";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}
//echo "connected succesfuly";