<?php
$name1 = $_GET['p_name'];
$user = $_GET['u_name'];
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');  
//setting header to json
header('Content-Type: application/json');
//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'internet');
define('DB_NAME', 'cazri');
//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT  `price`, `$user` FROM `plant_list` WHERE `Name of plant` = '$name1'");
//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
//free memory associated with result
$result->close();
//close connection
$mysqli->close();
//now print the data
print json_encode($data);
?>
