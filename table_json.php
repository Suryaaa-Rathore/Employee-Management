<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Json!</title>
  </head>
  <body>
  	<?php
	$str = file_get_contents('upload/surya.json');
	$json = json_decode($str, true); // decode the JSON into an associative array
	// $id = count($json['orders']);
	?>

  	<div class="container bg-info text-center">
  		<h1>Json data</h1>
			<table class="table table-dark">
			  <thead>
			    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Order No.</th>
			      <th scope="col">Product Quantity</th>
			      <th scope="col">Total Price</th>
			      <th scope="col">Line_items Quantity</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			    	<?php foreach ($json['orders'] as $key => $value) { ?>
			      <th><?php echo $key+1 ?></th>
			      <td><?php		
			      	echo $value['order_number'];
			      ?></td>
			      <td><?php
			      	echo count($value['line_items']) ;
			      ?></td>

			      <td><?php
					echo $value['total_price'] ;
			      ?></td>
			      <td><?php 
				      	$count = 0;
						foreach ($value['line_items'] as $key => $value) {
							for ($i=0; $i < $value['quantity'] ; $i++) { 
									$count++;
								}
							// echo $value['quantity'] . "<br>";
							// $count++;
						}
						echo "$count";
						?>
					</td>
			  
			    </tr>
			    <?php } ?>
			    
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
