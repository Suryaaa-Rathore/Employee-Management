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
		$hash = $row['password'];
		if(password_verify($pass, $hash)){
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['user'] = $row['username'];
			$_SESSION['img'] = $row['img'];
			header("location: /employee/home.php");
		}else{
		header("location: /employee/login.php?error=1");
		}

	}else{
		header("location: /employee/login.php?error=1");
	}
	
}
?>