<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sistem_informasi";

$con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>