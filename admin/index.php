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
			<h1 class="center">خوش آمدید</h1>
		</main>
	</body>
</html>