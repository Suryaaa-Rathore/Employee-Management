<?php
$str = file_get_contents('upload/surya.json');
$json = json_decode($str, true); // decode the JSON into an associative array
// echo '<pre>' . print_r($json, true) . '</pre>';
// foreach ($json['orders']['0'] as $key => $value) {
    // echo "$key => $value <br>";
 //    foreach ($value as $key => $result) {
 //    	echo "$key => $result <br>";
	// }
// }
// echo count($json['orders'][0]['line_items']);

// foreach ($json['orders'] as $key => $value) {
//     echo "$key => $value<br>";
    // foreach ($value as $key => $value) {
    // 	echo "$key => $value <br>";
    // }
// }
foreach ($json['orders'] as $key => $value) {
	// echo $value['line_items'][0]['quantity'];
	echo "<br>";
	$count = 0;
	foreach ($value['line_items'] as $key => $value) {
		// echo $value['quantity'];
		// $count = 0;
		for ($i=0; $i < $value['quantity'] ; $i++) { 
			$count++;
		}
		
		 // foreach ($value['quantity'] as $key => $value) {
		 // 	// echo "$value <br>";
		 // 	echo " $key => $value";
		 // 	// foreach($key['quantity'] as $value){
		 // 	// 	// echo "$value <br>";
		 // 	// 	echo "<br>";
		 // 	// }
		 // }
	}
	echo $count;
	 // echo "$count <br>";
}

?>