<?php

include '_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user = $_POST['username'];
	$pass = $_POST['pwd'];
	$sql = "SELECT * FROM `user` WHERE username = '$user'";
	$result = mysqli_query($connect,$sql);
	$num = mysqli_num_rows($result);
	if ($num > 0) {
		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$pass = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "UPDATE `user` SET `password` = '$pass' WHERE `user`.`id` = '$id' ";
		$result = mysqli_query($connect,$sql);
		if ($result) {
			header("location: /employee/login.php?success=1");
		}else{
			echo "something went wrong";
		}

	}else{
		header("location: /employee/forget.php?error=1");
	}
	
}
?>

<!-- if ($num > 0) {
		$row = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['user'] = $row['username'];
		$_SESSION['img'] = $row['img'];
		header("location: /employee/home.php");

	}else{
		header("location: /employee/login.php?error=1");
	} -->