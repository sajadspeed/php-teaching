<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "mag";

	$con = mysqli_connect($host, $username, $password, $db_name);

	if($con == false){
		exit("DB Error" . mysqli_connect_error());
	}

	$sql = "SELECT * FROM `user`";
	$result = mysqli_query($con, $sql);

	$users = mysqli_fetch_all($result, 1);
	var_dump($users);

	$allowColumn = ['id', 'username', 'password'];

	$headerColumn = ['آی دی', 'یوزرنیم' , 'پسورد'];

	echo "<table border='1'>";

	echo "<tr>";
	foreach ($allowColumn as $headerKey=>$header) {
		echo "<th>{$headerColumn[$headerKey]}</th>";
	}
	echo "</tr>";


	foreach ($users as $row) {
		echo "<tr>";
				foreach ($row as $keyColumn => $column) {
					if(in_array($keyColumn, $allowColumn))
						echo "<td>$column</td>";
				}
		echo "</tr>";
	}

	echo "</table>";
	/*
	$sql = "INSERT INTO `users`(`name`, `username`, `password`, `email_`) VALUES ('Ali', 'ali', '12345678', 'test@test.com')";
	$result = mysqli_query($con, $sql);

	if($result == false){
		echo "QUERY ERROR " . mysqli_error($con);
	}
	*/

	/*
	$sql = "DELETE FROM `users` WHERE `id` = 5";
	mysqli_query($con, $sql);
	*/

?>