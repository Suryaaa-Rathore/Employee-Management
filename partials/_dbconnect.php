<?php
$server = "localhost";
$username = "root";
$password = "12345";
$database = "employee";
$connect = mysqli_connect($server,$username,$password,$database);
if (!$connect) {
	die("Connection Failed to Database" . mysqli_connect_error() );
}
?>