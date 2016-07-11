<?php 
$databaseICON = "icon256";
$host = "localhost";
$user = "root";
$password = "";

$connectICON = mysqli_connect($host,$user,$password,$databaseICON);
		if(mysqli_connect_errno()){
			die('could not connect '.mysqli_connect_error());
		}
		
$databaseCH = "course_handler";

$con = mysqli_connect($host,$user,$password,$databaseCH);
		if(mysqli_connect_errno()){
			die('could not connect '.mysqli_connect_error());
		}
?>