<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "mag";

	$con = mysqli_connect($host, $username, $password, $db_name);

	if($con == false){
		exit("DB Error" . mysqli_connect_error());
	}
?>