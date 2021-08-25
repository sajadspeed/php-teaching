<?php
	session_start();
	include "include/function.php";
?>
<!DOCTYPE html>
<html>
	<?php
		head("Home", "index");
	?>

	<body>
		<?php
			include "include/header.php";
		?>
		<main>
			<section>
				<!--
				<header>
					<h1>سینما</h1>
				</header>
				-->

				<?php
					$query = " SELECT `post`.`id`, `title`, `memo`, `image`, `category_id`, `category`.`name` AS 'category_name' 
							   FROM `post` LEFT JOIN `category` ON `post`.`category_id` = `category`.`id` 
							   ORDER BY `post`.`id` DESC LIMIT 10 ";

					$select = $db->execute($query);

					$posts = $select->fetch_all(MYSQLI_ASSOC);

					foreach ($posts as $item) {
						echo '
							<div class="post">
								<img src="'.url_post_image($item['image']).'" alt="'.$item['title'].'">
								<div class="info">
									<h1>'.$item['title'].'</h1>
									<span>دسته بندی: <a href="'.url_category($item['category_id']).'">'.$item['category_name'].'</a></span>
									<p>'.mb_substr($item['memo'], 0, 150).'...</p>
									<a href="'.url_post($item['id']).'" class="read-more">بیشتر</a>
								</div>
							</div>
						';
					}
				?>
				<ul class="pages">
					<li class="active">1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
				</ul>
			</section>
		</main>
		<?php
			include "include/aside.php";

			include "include/footer.php";
		?>
	</body>
</html>