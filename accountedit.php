<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header("location: /employee/login.php");
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

    <title>Edit Profile!!</title>
  </head>
  <body>
    <?php include "partials/_header.php" ?>
  	<?php include "partials/_dbconnect.php" ?>
    <div class="container mt-3" >
      <h2 style="text-align: center;" >Edit Details!!</h2>
      <?php
      if (isset($_GET['file'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> extension not allowed, please choose a svg, jpg, jpeg or png file..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

      <form action="partials/_accountdata.php" method="POST" enctype='multipart/form-data'>
        <?php
        $id = $_SESSION['user'];
        $sql = "SELECT * FROM `user` WHERE username = '$id'";
        $result = mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        if ($num>0) {
          $row = mysqli_fetch_assoc($result);
        ?>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" aria-describedby="emailHelp">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['first_name']; ?>" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['last_name']; ?>" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Date of Birth</label>
          <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['birth_date']; ?>" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $row['username']; ?>" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
              <label for="exampleFormControlFile1">Profile Picture</label>
              <input type="file" class="form-control-file" id="img" name="img">
          </div>        
          <input type="hidden" name="pwd" value="<?php echo $row['password']; ?>" >
          <input type="hidden" name="pimg" value="<?php echo $row['img']; ?>" >
        <button type="submit" class="btn btn-success">Update</button>
        <?php
      }
      ?>
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
