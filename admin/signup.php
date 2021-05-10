<?php
	include "../include/db.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>Signup - Admin</title>
		<link rel="stylesheet" href="css/style.css" >
	</head>

	<body>
		<?php
			if(isset($_POST['submit'])){
				if(strlen($_POST['password']) >= 8){
					$hashPassword = hash("sha256", $_POST['password']);
					$query = "INSERT INTO `user`(`username`, `password`, `email`) VALUES ('{$_POST['username']}','$hashPassword','{$_POST['email']}')";

					if(mysqli_query($con, $query)){
						echo "خوش آمدید";
					}
					else{
						echo "ثبت نام شکست خورد";
					}

				}else{
					echo "پسورد کمتر از 8 کاراکتر";
				}

			}
		?>

		<form action="" method="POST">
			<input type="text" name="username" placeholder="نام کاربری:" required>
			<input type="email" name="email" placeholder="ایمیل:" required>
			<input type="password" name="password" placeholder="پسورد:" required>
			<button name="submit">ثبت نام</button>
		</form>
	</body>
</html>