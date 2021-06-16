<!-- $sql = "SELECT * From `employee_data`"; -->
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

    <title>All Data!!</title>
  </head>
  <body>
  	<?php include "partials/_header.php" ?>

  	<?php include "partials/_dbconnect.php" ?>

  	

    <div class="container-fluid mt-3">
    	<table class="table text-center">
    		<caption style="caption-side: top; text-align: center;">List of Employees</caption>
		  <thead>
    		<!-- row start -->
    		<div class="row">
				
				<!-- search anything -->
				<div class="form-inline col-md-12">
					  <form action="search.php" method="GET" >
						<div class="form-group">
							<label for="exampleFormControlSelect2">Sort By Name</label>
							<select class="dropdown" name="emp_order" id="emp_order">
							  <option>name_asc</option>
							  <option>name_desc</option>
							</select>
						</div>
						<!-- CTC filter -->
							<div class="form-group ">
								<label for="exampleFormControlSelect1">CTC</label>
								<select class="dropdown-toggle" name="ctc" id="ctc">
								  <!-- <option>select</option> -->

								<?php
								$sql_c = "SELECT DISTINCT ctc FROM employee_data ORDER BY ctc ";
								$result_c = mysqli_query($connect,$sql_c);
								$num = mysqli_num_rows($result_c);
								if ($num>0) {
									while($row_c = mysqli_fetch_assoc($result_c)){

								?>
								  <option selected ><?php echo $row_c['ctc']; ?></option>

								  <?php
										}
									}
									?>
								  <!-- <option>15000</option>
								  <option>30000</option> -->
								</select>
						  </div>
						  <!-- start date to end date -->
						  <div class="form-group">
							<div class="col">
								<label>start-date</label>
							  <input type="date" class="form-control row" name="start" placeholder="start-date">
							</div>
							<div class="col">
								<label>end-date</label>
							  <input type="date" class="form-control row" name="end" placeholder="end-date">
							</div>
						  </div>

						  <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
						  <button class="btn btn-outline-success mx-2" type="submit">Search</button>
					  </form>
				</div>
			</div>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Date of Joining</th>
		      <th scope="col">CTC</th>
		      <th scope="col">Reporting Officer</th>
		      <th scope="col">Date of Exit</th>
		      <th scope="col">Department</th>
		      <th scope="col">Remark</th>
		      <th scope="col">CV</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php

		  		$sql = "SELECT * FROM `employee_data` ";

				if (isset($_GET['emp_order']) && isset($_GET['ctc']) && isset($_GET['start']) && isset($_GET['end']) && isset($_GET['search'])) {
					$order = $_GET['emp_order'];
					$ctc = $_GET['ctc'];
					$query = $_GET['search'];
					if ($order == 'name_asc') {
						$sql .= " WHERE id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' AND ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` ASC ";
					}else{

						$sql .= " WHERE id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' AND ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` DESC ";
					}

				}elseif (isset($_GET['emp_order']) && isset($_GET['ctc']) && isset($_GET['start']) && isset($_GET['end'] ) && isset($_GET['search']) && empty($_GET['start']) && empty($_GET['end']) ) {
					$order = $_GET['emp_order'];
					$ctc = $_GET['ctc'];
					if ($order == 'name_asc') {
						$sql .= " WHERE id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' AND  ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` ASC ";
					}else{
						$sql .= " WHERE id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' AND  ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` DESC ";
					}
				}elseif (isset($_GET['emp_order']) && isset($_GET['ctc']) && isset($_GET['start']) && isset($_GET['end'] ) && isset($_GET['search']) && empty($_GET['search'])) {
					$order = $_GET['emp_order'];
					$ctc = $_GET['ctc'];
					$start = $_GET['start'];
					$end = $_GET['end'];
					if ($order == 'name_asc') {
						$sql .= " WHERE joining_date BETWEEN '$start' AND '$end' AND ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` ASC ";
					}else{
					$sql .= " WHERE joining_date BETWEEN '$start' AND '$end' AND ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` DESC ";
					}
				}elseif (isset($_GET['emp_order']) && isset($_GET['ctc']) && isset($_GET['start']) && isset($_GET['end'] ) && isset($_GET['search']) && empty($_GET['end'])) {
					$order = $_GET['emp_order'];
					$ctc = $_GET['ctc'];
					$start = $_GET['start'];
					$end = date("Y-m-d");
					$query = $_GET['search'];
					if ($order == 'name_asc') {
						$sql .= " WHERE joining_date BETWEEN '$start' AND '$end' AND ctc BETWEEN '0' AND '$ctc' AND id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' ORDER BY `employee_data`.`name` ASC ";
					}else{
							$sql .= " WHERE joining_date BETWEEN '$start' AND '$end' AND ctc BETWEEN '0' AND '$ctc' AND id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' ORDER BY `employee_data`.`name` DESC ";
					}

				}elseif (isset($_GET['emp_order']) && isset($_GET['ctc']) && isset($_GET['start']) && isset($_GET['end'] ) && isset($_GET['search']) && empty($_GET['start'])) {
					$order = $_GET['emp_order'];
					$ctc = $_GET['ctc'];
					$end = $_GET['end'];
					$query = $_GET['search'];
					if ($order == 'name_asc') {
						$sql .= " WHERE joining_date BETWEEN '1998-08-10' AND '$end' AND ctc BETWEEN '0' AND '$ctc' AND id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' ORDER BY `employee_data`.`name` ASC ";
					}else{
					$sql .= " WHERE joining_date BETWEEN '1998-08-10' AND '$end' AND ctc BETWEEN '0' AND '$ctc' AND id LIKE '%$query%' OR name LIKE '%$query%' OR department LIKE '%$query%' ORDER BY `employee_data`.`name` DESC ";
					}
				}elseif (isset($_GET['emp_order']) && isset($_GET['ctc']) && isset($_GET['start']) && isset($_GET['end'] ) && isset($_GET['search']) && empty($_GET['start']) && empty($_GET['end']) && empty($_GET['search'])) {
					$order = $_GET['emp_order'];
					$ctc = $_GET['ctc'];
					if ($order == 'name_asc') {
						$sql .= " WHERE ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` ASC ";
					}else{
					$sql .= " WHERE ctc BETWEEN '0' AND '$ctc' ORDER BY `employee_data`.`name` DESC ";
					}
				}

				
				$result = mysqli_query($connect,$sql);
				$num = mysqli_num_rows($result);
				if ($num>0) {
					while($row = mysqli_fetch_assoc($result)){
					
			?>
		    <tr>
		      <td><?php echo $row['id']; ?></td>
		      <td><?php echo $row['name']; ?></td>
		      <td><?php echo $row['joining_date']; ?></td>
		      <td><?php echo $row['ctc']; ?></td>
		      <td><?php echo $row['reporting_officer']; ?></td>
		      <td><?php echo $row['exit_date']; ?></td>
		      <td><?php echo $row['department']; ?></td>
		      <td><?php echo $row['remark']; ?></td>
		      <td><a href="upload/<?php echo $row['cv']; ?>" ><?php echo $row['cv']; ?></a></td>
		      <th><a class="btn btn-outline-info" href="edit.php?id=<?php echo $row['id'];?>" role="button">Edit</a> - <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" role="button">Delete</button></th>
		      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-outline-danger" href="partials/_delete.php?id=<?php echo $row['id'];?> " >Delete</a>
      </div>`
    </div>
  </div>
</div>
<!-- href="partials/_delete.php?id=<?php //echo $row['id'];?> -->
		    </tr>
		    <?php
		    	}
			}
		    ?>
		  </tbody>
		</table>

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
