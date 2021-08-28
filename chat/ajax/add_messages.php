<?php
    $con = new mysqli("localhost","root", "", "mag");
?>

<?php
	$name = $_POST['name'];
	$message = $_POST['message'];

    if($con->query("INSERT INTO `messages`(`name`, `message`, `date`) VALUES ('$name', '$message', ".time().")"))
		echo 1;
	else
		echo 0;
?>