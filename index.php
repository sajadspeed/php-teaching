<?php
	include "include/function.php";
	include "include/db.php";
?>
<!DOCTYPE html>
<html>
	<?php
		head("Home", "index");
	?>

	<body>
		<nav>
			<ul>
				<li><a href="index.php"><i class="icofont-ui-home"></i></a></li>
				<li><a href="#">لورم ایپسوم</a></li>
				<li><a href="#">لورم ایپسوم</a></li>
				<li><a href="#">لورم ایپسوم</a></li>
				<li><a href="#">ورود / ثبت نام</a></li>
			</ul>

			<div class="search">
				<form>
					<input type="search" name="q" placeholder="جستجو...">
					<button>جستجو</button>
				</form>
			</div>
		</nav>
	</body>
</html>