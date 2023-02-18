<?php
//date_default_timezone_set('America/New York');

date_default_timezone_set('America/New_York');

# Codes to get into database on London
$hostname = "localhost";
$database = "classicmodels";
$username = "root";
$password = "";

global $connection;
$connection = mysqli_connect($hostname, $username, $password, $database) or die("Connection failed: " . mysqli_error($connection));


?>