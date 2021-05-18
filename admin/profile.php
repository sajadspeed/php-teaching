<?php
	session_start();
	include "../include/db.php";
	include "../include/function.php";

	if(!isLogin())
		redirect("login.php");
?>
<!DOCTYPE html>
<html>
	<?php
		head();
	?>

	<body>
		<?php include "../include/aside_admin.php" ?>
		<main>
			<h1>پروفایل</h1>

			<?php
				$select = mysqli_query($con, "SELECT `username`, `email` FROM `user` WHERE `id`=".$_SESSION['user_id']);

				$user = mysqli_fetch_assoc($select);
			?>

			<form action="" method="POST">
				<label>نام کاربری</label>
				<input type="text" value="<?php echo $user['username'] ?>">
				<label>ایمیل</label>
				<input type="email" value="<?php echo $user['email'] ?>">
				<label>پسورد</label>
				<input type="password" value="********">

				<button name="submit">تغییر</button>
			</form>

			<?php
				if(isset($_POST['submit'])){
					
				}
			?>
		</main>
	</body>
</html>