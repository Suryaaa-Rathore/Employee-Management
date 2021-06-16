<?php
$str = file_get_contents('upload/surya.json');
$json = json_decode($str, true); // decode the JSON into an associative array
echo '<pre>' . print_r($json, true) . '</pre>';
?>