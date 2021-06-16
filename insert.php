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

    <title>Insert Data!</title>
    
  </head>
  <body>
  	<?php include "partials/_header.php" ?>

    <div class="container mt-3">
    <h3 style="text-align: center;">New Employee Form!!</h3>      
    <?php
    if (isset($_GET['file'])) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!!</strong> extension not allowed, please choose a pdf or jpg file.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>
      <form action="partials/_insertdata.php" method="POST" enctype='multipart/form-data' >
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" required id="name" name="name" aria-describedby="emailHelp">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Date of Joining</label>
            <input type="date" class="form-control" required id="doj" name="doj" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">CTC</label>
            <input type="text" class="form-control" required id="ctc" name="ctc" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Reporting Officer Name</label>
            <input type="text" class="form-control" required id="rep_off" name="rep_off" aria-describedby="emailHelp">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Date of Exit</label>
            <input type="date" class="form-control"  id="doe" name="doe" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Department</label>
            <input type="text" class="form-control" required id="department" name="department">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Remark</label>
              <textarea class="form-control" required id="remark" name="remark" rows="3"></textarea>
          </div>
          <div class="form-group">
              <label for="exampleFormControlFile1">Upload CV</label>
              <input type="file" class="form-control-file" id="cv" name="cv">
          </div>
          <button type="submit"  class="btn btn-primary">Submit</button>
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
