<?php 

$dbname = "web20191series";
$user = "web20191";
$passw = "web20191";

try {
	$conn = new PDO("mysql:host=localhost;dbname=".$dbname,$user, $passw);
	// echo"deu bom";
} 
 catch (PDOException $e) {
	$e-> getMessage();
	// echo "ERROR";
}
?>