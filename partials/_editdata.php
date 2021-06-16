<?php
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$doj = $_POST['doj'];
	$ctc = $_POST['ctc'];
	$rep_off = $_POST['rep_off'];
	$doe = $_POST['doe'];
	$department = $_POST['department'];
	$remark = $_POST['remark'];
	// $cv = $_POST['cv'];

	include "_dbconnect.php";
//uploading file to upload folder
	$uploaddir = '/var/www/html/employee/upload/';
	$uploadfile = $uploaddir . basename($_FILES['cv']['name']);
	move_uploaded_file($_FILES['cv']['tmp_name'], $uploadfile);
	print_r($_FILES);
    $cv = $_FILES['cv']['name'];

	$sql = "UPDATE `employee_data` SET `name` = '$name',`joining_date` = '$doj', `ctc` = '$ctc',`reporting_officer` = '$rep_off',`exit_date` = '$doe',`department` = '$department',`remark` = '$remark', `cv` = '$cv' WHERE `employee_data`.`id` = $id ";
	$result = mysqli_query($connect,$sql);
	if ($result) {
		header("location: /employee/home.php");
	}else{
		header("location: /employee/home.php");
		// echo "Something Went Wrong";
	}

}
?>