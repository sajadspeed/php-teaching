<?php
	session_start();

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
				$password = hash("sha256", $_POST['password']);
				$select = mysqli_query($con, "SELECT `id`, `username` FROM `user` WHERE `username`='{$_POST['username']}' AND `password`='$password'");

				$user = mysqli_fetch_all($select, MYSQLI_ASSOC);

				if(count($user) == 1) {
					loginSuccess($user[0]['id'], $user[0]['username']);
				}
				else{
					alert("اطلاعات نامعتبر");
				}
			}
		?>

		<form action="" method="POST">
			<h1>ورود به سایت</h1>
			<input type="text" name="username" placeholder="نام کاربری:" required>
			<input type="password" name="password" placeholder="پسورد:" required>
			<button name="submit">ورود</button>
			<button name="login" type="button"><a href="signup.php" class="button">ثبت نام در سایت</a></button>
		</form>
	</body>
</html>