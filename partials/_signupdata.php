<?php 
include '_dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dob = $_POST['dob'];
	$user = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$cpwd = $_POST['cpwd'];
	$img = $_FILES['img']['name'];
//if user didn't select an upload image
	if (empty($img)) {
		
		$img = "none.jpg";

		$sql = "SELECT * FROM `user` WHERE `username` = '$user' ";
		$result = mysqli_query($connect,$sql);
		$num = mysqli_num_rows($result);

		if ($num>0) {
			header("location: /employee/signup.php?username=1");
		}else{

			// echo $user;
			if ($pwd == $cpwd) {
				$pwd = password_hash($pwd, PASSWORD_DEFAULT);

				$sql = "INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `birth_date`, `username`, `password`, `img`, `timestamp`) VALUES (NULL, '$email', '$fname', '$lname', '$dob', '$user', '$pwd', '$img', CURRENT_TIMESTAMP)";
					$result = mysqli_query($connect,$sql);
			}else{
				header("location: /employee/signup.php?error=1");
			}

			if ($result) {
				// echo "Record Inserted";
				$sql = "SELECT * FROM `user` WHERE username = '$user' AND password = '$pwd' ";
				$result = mysqli_query($connect,$sql);
				$num = mysqli_num_rows($result);
				if ($num > 0) {
					$row = mysqli_fetch_assoc($result);
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['user'] = $row['username'];
					$_SESSION['img'] = $row['img'];
					header("location: /employee/home.php");
				}
			}else{
				echo "Something Went Wrong";
				echo mysqli_error($connect);
			}
		}

	}else{

		//if user select an upload image
			$file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
		      
		      $extensions= array("svg","jpg","jpeg","png");
		      
		    if(in_array($file_ext,$extensions)=== false){
		         $errors[]="extension not allowed, please choose a svg, jpg, jpeg or png file.";
		         var_dump($errors);
		         header("location: /employee/signup.php?file=1");
		    }else{
			//for file upload
			$uploaddir = '/var/www/html/employee/img/';
			$uploadfile = $uploaddir . basename($_FILES['img']['name']);
			move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
			// print_r($_FILES);

			$sql = "SELECT * FROM `user` WHERE `username` = '$user' ";
			$result = mysqli_query($connect,$sql);
			$num = mysqli_num_rows($result);

			if ($num>0) {
				header("location: /employee/signup.php?username=1");
			}else{

				// echo $user;
				if ($pwd == $cpwd) {
					$pwd = password_hash($pwd, PASSWORD_DEFAULT);

					$sql = "INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `birth_date`, `username`, `password`, `img`, `timestamp`) VALUES (NULL, '$email', '$fname', '$lname', '$dob', '$user', '$pwd', '$img', CURRENT_TIMESTAMP)";
						$result = mysqli_query($connect,$sql);
				}else{
					header("location: /employee/signup.php?error=1");
				}

				if ($result) {
					// echo "Record Inserted";
					$sql = "SELECT * FROM `user` WHERE username = '$user' AND password = '$pwd' ";
					$result = mysqli_query($connect,$sql);
					$num = mysqli_num_rows($result);
					if ($num > 0) {
						$row = mysqli_fetch_assoc($result);
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['user'] = $row['username'];
						$_SESSION['img'] = $row['img'];
						header("location: /employee/home.php");
					}
				}else{
					echo "Something Went Wrong";
					echo mysqli_error($connect);
				}
			}
		}

	}

}
?>