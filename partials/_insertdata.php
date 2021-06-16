<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$doj = $_POST['doj'];
	$ctc = $_POST['ctc'];
	$rep_off = $_POST['rep_off'];
	$doe = $_POST['doe'];
	$department = $_POST['department'];
	$remark = $_POST['remark'];
	// $cv = $_POST['cv'];

	 $file_ext=strtolower(end(explode('.',$_FILES['cv']['name'])));
      
      $extensions= array("pdf","docx","doc");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a pdf or jpg file.";
         var_dump($errors);
         header("location: /employee/insert.php?file=1");
      }else{



//for file upload
	$uploaddir = '/var/www/html/employee/upload/';
	$uploadfile = $uploaddir . basename($_FILES['cv']['name']);
	move_uploaded_file($_FILES['cv']['tmp_name'], $uploadfile);
	print_r($_FILES);
    $cv = $_FILES['cv']['name'];


	// $target_Path = "/employee/upload/";
	// $target_Path = $target_Path.basename( $_FILES['file']['name'] );
	// move_uploaded_file( $_FILES['file']['tmp_name'], $target_Path );

	include "_dbconnect.php";

	$sql = "INSERT INTO `employee_data` (`id`, `name`, `joining_date`, `ctc`, `reporting_officer`, `exit_date`, `department`, `remark`, `cv`) VALUES (NULL, '$name', '$doj', '$ctc', '$rep_off', NULL, '$department', '$remark', '$cv')";
	$result = mysqli_query($connect,$sql);


	if ($result) {
		header("location: /employee/home.php");
	}else{
		echo "Something Went Wrong";
		echo "<br>";
		echo mysqli_error($connect);
	}
}
}
?>