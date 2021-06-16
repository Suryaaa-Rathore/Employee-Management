<?php
include "_dbconnect.php";
$id = $_GET['id'];
$sql = "DELETE FROM `employee_data` WHERE `employee_data`.`id` = $id";
$result = mysqli_query($connect,$sql);
if ($result) {
	header("location: /employee/home.php");
}else{
	echo "Something Went Wrong";
}
?>