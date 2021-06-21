<nav>
	<ul>
		<li><a href="index.php"><i class="icofont-ui-home"></i></a></li>
		<?php
			$query = mysqli_query($con, "SELECT `id`, `name` FROM `category` WHERE `show` = 1 ORDER BY `id`");

			$categories = mysqli_fetch_all($query, MYSQLI_ASSOC);

			foreach ($categories as $value) {
				echo '<li><a href="'.url_category($value['id']).'">'.$value['name'].'</a></li>';
			}
		?>
		<?php
			if(isLogin())
				echo '<li><a href="admin">'.$_SESSION['username'].'</a></li>';
			else
				echo '<li><a href="admin">ورود / ثبت نام</a></li>';
		?>
	</ul>

	<div class="search">
		<form>
			<input type="search" name="q" placeholder="جستجو...">
			<button>جستجو</button>
		</form>
	</div>
</nav>