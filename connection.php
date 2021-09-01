<?php 
session_start();
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "loginv1";

$connection = new mysqli($server, $username, $password, $dbname);

if($connection->connect_error){
	die("Failed");
}

?>