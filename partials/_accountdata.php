<?php 
include '_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = $_POST['id'];
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$user = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$img = $_FILES['img']['name'];

	if (empty($img)) {
		$img = $_POST['pimg'];
		
		$sql = "UPDATE `user` SET `email` = '$email', `first_name` = '$fname', `last_name` = '$lname', `birth_date` = '$dob', `username` = '$user', `password` = '$pwd', `img` = '$img', `timestamp` = CURRENT_TIMESTAMP WHERE `user`.`id` = '$id'";
		$result = mysqli_query($connect,$sql);

		if ($result) {
			header("location: /employee/account.php");
		}
		else{
			echo "Something Went Wrong";
			echo mysqli_error($connect);
		}
	}
	

	$file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
      
      $extensions= array("svg","jpg","jpeg","png");
      
    if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a svg, jpg, jpeg or png file.";
         var_dump($errors);
         header("location: /employee/accountedit.php?file=1");
    }else{
	//for file upload
	$uploaddir = '/var/www/html/employee/img/';
	$uploadfile = $uploaddir . basename($_FILES['img']['name']);
	move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
	print_r($_FILES);
	
	

	// echo $user;
	
		// $sql = "UPDATE `user` SET (`id`, `email`, `first_name`, `last_name`, `birth_date`, `username`, `password`, `img`, `timestamp`) VALUES (NULL, '$email', '$fname', '$lname', '$dob', '$user', '$pwd', '$img', CURRENT_TIMESTAMP)";
	$sql = "UPDATE `user` SET `email` = '$email', `first_name` = '$fname', `last_name` = '$lname', `birth_date` = '$dob', `username` = '$user', `password` = '$pwd', `img` = '$img', `timestamp` = CURRENT_TIMESTAMP WHERE `user`.`id` = '$id'";
	$result = mysqli_query($connect,$sql);
	}

	if ($result) {
		header("location: /employee/account.php");
	}
	else{
		echo "Something Went Wrong";
		echo mysqli_error($connect);
	}
}

?>