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

    <title>Edit Data!</title>
    
  </head>
  <body>
  	<?php include "partials/_header.php" ?>
    <?php include "partials/_dbconnect.php" ?>
    <?php

    $id = $_GET['id'];
    ?>

    <div class="container mt-3">
    <h3 style="text-align: center;">New Employee Form!!</h3>      
      <form action="partials/_editdata.php?id=<?php echo $id; ?>" method="POST" enctype='multipart/form-data'>
        <?php
          $sql = "SELECT * From `employee_data` WHERE id = '$id' ";
          $result = mysqli_query($connect,$sql);
          $num = mysqli_num_rows($result);
          if ($num>0) {
            while($row = mysqli_fetch_assoc($result)){
            
        ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" aria-describedby="emailHelp">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Date of Joining</label>
            <input type="date" class="form-control" id="doj" name="doj" value="<?php echo $row['joining_date']; ?>" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">CTC</label>
            <input type="text" class="form-control" id="ctc" name="ctc" value="<?php echo $row['ctc']; ?>" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Reporting Officer Name</label>
            <input type="text" class="form-control" id="rep_off" name="rep_off" value="<?php echo $row['reporting_officer']; ?>" aria-describedby="emailHelp">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Date of Exit</label>
            <input type="date" class="form-control" id="doe" name="doe" value="<?php echo $row['exit_date']; ?>" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['department']; ?>">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Remark</label>
              <textarea class="form-control" id="remark" name="remark" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload CV</label>
            <input type="file" class="form-control-file" id="cv" name="cv" >
          </div>
          <button type="submit" class="btn btn-primary btn-block">Update</button>
          <?php
            }
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
