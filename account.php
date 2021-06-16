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

    <title>Profile!</title>
  </head>
  <body>
    <?php include "partials/_header.php" ?>
      <?php include "partials/_dbconnect.php" ?>
  
      <?php
      function getAge($dob) {
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dob), date_create($today));
      return $diff->format('%y Years');
      }
      ?>
    <div class="container mt-5">
      <?php
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM `user` WHERE `username` = '$user' ";
        $result = mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        if ($num>0) {
          $row = mysqli_fetch_assoc($result);
        
        ?>
      <div class="row" >
        <div class="col-md-6 order-md-1">
          <img class="d-block mx-auto mb-4 border border-success" src="/employee/img/<?php echo $row['img']; ?>" alt="" width="150" height="150">
          <h2 class="text-center" > Hello - <?php echo $_SESSION['user']; ?></h2>
          <div class="container my-4">
            <div class="row mx-3 my-2">
              <div class="form-group order-md-1 mx-4">
                <h6>First Name:</h6>
                <h6 class="form-control my-2"><?php echo $row['first_name']; ?></h6>
              </div>
              <div class="form-group order-md-2 mx-4" >
                <h6>Last Name:</h6>
                <h6 class="form-control disabled my-2"><?php echo $row['last_name']; ?></h6>
              </div>
              
            </div>
        </div>
        </div>
        <div class="col-md-6 order-md-2 mb-4">
          <ul class="list-group mt-3 ">
           
          <label>Email:</label>
          <li class="list-group-item my-2"> <?php echo $row['email']; ?></li>
          <label>Date of Birth:</label>
          <li class="list-group-item my-2"> <?php echo $row['birth_date']; ?></li>
          <label>Age:</label>
          <?php
          $age = $row['birth_date'];
          ?>
          <li class="list-group-item my-2"><?php echo getAge($age);?></li>
        
        </ul>
        </div>
      </div>

      <?php
         }
         ?>
      <a class="btn btn-success btn-block" href="accountedit.php" type="button">Edit</a>
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
