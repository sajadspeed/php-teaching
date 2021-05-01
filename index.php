<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "php_learning";

	$con = mysqli_connect($host, $username, $password, $db_name);

	if($con == false){
		exit("DB Error" . mysqli_connect_error());
	}
	
	$sql = "INSERT INTO `users`(`name`, `username`, `password`, `email_`) VALUES ('Ali', 'ali', '12345678', 'test@test.com')";
	$result = mysqli_query($con, $sql);

	if($result == false){
		echo "QUERY ERROR " . mysqli_error($con);
	}
	

	/*
	$sql = "DELETE FROM `users` WHERE `id` = 5";
	mysqli_query($con, $sql);
	*/

?>