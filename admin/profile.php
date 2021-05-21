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
				<input type="text" name="username" value="<?php echo $user['username'] ?>">
				<label>ایمیل</label>
				<input type="email" name="email" value="<?php echo $user['email'] ?>">
				<label>پسورد</label>
				<input type="password" name="password" value="********">

				<button name="submit">تغییر</button>
			</form>
 
			<?php
				if(isset($_POST['submit'])){
					if($user['username']!=$_POST['username']||$user['email']!=$_POST['email']){
						mysqli_query($con, "UPDATE `user` SET `username` = '{$_POST['username']}', `email` = '{$_POST['email']}' WHERE `id` =".$_SESSION['user_id'] );
						alert("ویرایش اطلاعات با موفقیت انجام شد. لطفا مجددا وارد شوید." , "success");
						redirect("logout.php");
					}
					if($_POST['password'] != "********"){
						$hashPassword = hash("sha256", $_POST['password']);
						mysqli_query($con, "UPDATE `user` SET `password`='$hashPassword' WHERE `id` =".$_SESSION['user_id'] );
						alert("ویرایش اطلاعات با موفقیت انجام شد. لطفا مجددا وارد شوید." , "success");
						redirect("logout.php");
					}
				}
			?>
		</main>
	</body>
</html>