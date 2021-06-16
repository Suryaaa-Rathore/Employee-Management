<?php
session_start();
if (isset($_SESSION['loggedin'])) {
  header("location: /employee/home.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Login!</title>
  </head>
  <body class="text-center bg-dark text-light">
 	<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5 text-dark">Employee Management System!!</h1>
  </div>
</div>
 	<div class="container col-md-6 ">
 		<?php
    if (isset($_GET['error'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Username or Password did not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }elseif (isset($_GET['success'])) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Password changed Successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
 		?>
 		<form class="form-signin" action="partials/_checklogin.php" method="POST">
			  <img class="mb-4 rounded border border-success" src="/employee/img/login.png" alt="" width="150" height="150">
			  <h1 class="h3 mb-3 font-weight-normal">Please Login!!</h1>
			  <div class="form-group">
			  	<label for="inputEmail">Username</label>
			  	<input type="text" id="username" name="username"  placeholder="Email address" required>
			  </div>
			  <div class="form-group">
			  	<label for="inputPassword">Password</label>
			  	<input type="password" id="pwd" name="pwd"  placeholder="Password" required>
			  </div>
        <div class="form-group">
          <a href="signup.php">New User? SignUp!!</a>
          <a  class="mx-3" style="color: red;" href="forget.php">Forget Password ??</a>
        </div>
  			<button class="btn btn-lg btn-outline-success btn-block" type="submit">Login</button>
		</form>
 	</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
