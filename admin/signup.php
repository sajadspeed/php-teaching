<?php
	include "../include/db.php";
	include "../include/function.php";
?>
<!DOCTYPE html>
<html>
	<?php
		head();
	?>
	<body>
		<?php
			if(isset($_POST['submit'])){
				if(strlen($_POST['password']) >= 8){
					$hashPassword = hash("sha256", $_POST['password']);
					$query = "INSERT INTO `user`(`username`, `password`, `email`) VALUES ('{$_POST['username']}','$hashPassword','{$_POST['email']}')";

					if(mysqli_query($con, $query)){
						alert("خوش آمدید", "success");
					}
					else{
						alert("ثبت نام شکست خورد");
					}

				}else{
					alert("پسورد کمتر از 8 کاراکتر");
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