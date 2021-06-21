<?php
	session_start();
	include "include/function.php";
	include "include/db.php";

	if(!isset($_GET['id']))
		redirect(absolute);

	$query = "
		SELECT `title`, `memo`, `image`, `category_id`, `category`.`name` AS 'category_name' , `keyword`, `description`
		FROM `post` LEFT JOIN `category` ON `post`.`category_id` = `category`.`id` WHERE `post`.`id` = {$_GET['id']}
	";

	$select = mysqli_query($con, $query);

	$post = mysqli_fetch_assoc($select);

	if($post == null || count($post) <= 0)
		exit("پست وجود ندارد");
	
	mysqli_query($con, "UPDATE `post` SET `view` = `view` + 1 WHERE `id` = {$_GET['id']}");
?>
<!DOCTYPE html>
<html>
	<?php
		$extra = '
			<link rel="stylesheet" href="css/show-post.css">
			<meta name="description" content="'.$post['description'].'">
  			<meta name="keywords" content="'.$post['keyword'].'">
		';
		head($post['title'], "index", $extra);
	?>

	<body>
		<?php
			include "include/header.php";
		?>
		<main>
			<img src="<?php echo url_post_image($post['image']) ?>" alt="<?php echo $post['title'] ?>">
			<h1><?php echo $post['title'] ?></h1>
			<span>دسته بندی: <a href="<?php echo url_category($post['category_id']) ?>"><?php echo $post['category_name'] ?></a></span>
			<p><?php echo $post['memo'] ?></p>

			<div class="suggestion">
				<div class="item">
					<img src="upload/post/113646991150.jpg" alt="">
					<h1>لورم الیپسوم</h1>
				</div>
				<div class="item">
					<img src="upload/post/113646991150.jpg" alt="">
					<h1>لورم الیپسوم</h1>
				</div>
				<div class="item">
					<img src="upload/post/113646991150.jpg" alt="">
					<h1>لورم الیپسوم</h1>
				</div>
			</div>
		</main>
		<?php
			include "include/aside.php";

			include "include/footer.php";
		?>
	</body>
</html>