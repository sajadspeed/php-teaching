<?php
	session_start();
	include "../include/db.php";
	include "../include/function.php";

	if(!isLogin())
		redirect("login.php");

	$formStatus = "add";
	$field_title = null;
	$field_memo = null;
	$field_keyword = null;
	$field_description = null;

	if(isset($_GET['action']) && isset($_GET['id'])){
		if($_GET['action'] == "delete"){
			if(!mysqli_query($con, "DELETE FROM `post` WHERE `id`=".$_GET['id']))
				alert();
			else
				redirect();
		}
		else if($_GET['action'] == "edit"){
			$select = mysqli_query($con, "SELECT `name` FROM `category` WHERE `id`=".$_GET['id']);
			$category = mysqli_fetch_assoc($select);

			$formStatus = "edit";
			$field_name = $category['name'];
		}
	}
?>
<!DOCTYPE html>
<html>
	<?php
		head();
	?>

	<body>
		<?php include "../include/aside_admin.php" ?>
		<main>
			<h1>پست</h1>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="text" placeholder="عنوان" name="title" value="<?php echo $field_title ?>" required>
				<label>عکس:</label>
				<input type="file" name="image" accept="image/jpeg" required>	
				<label>دسته بندی:</label>
				<select name="category">
					<?php
						$select = mysqli_query($con, "SELECT `id`, `name` FROM `category`");
						$categories = mysqli_fetch_all($select, MYSQLI_ASSOC);

						foreach ($categories as $value)
							echo "<option value='{$value['id']}'>{$value['name']}</option>";
					?>
				</select>
				<textarea placeholder="متن..." name="memo" required><?php echo $field_memo ?></textarea>
				<input type="text" placeholder="کلمات کلیدی" name="keyword" value="<?php echo $field_keyword ?>">
				<input type="text" placeholder="توضیحات" name="description" value="<?php echo $field_description ?>">
				<input type="hidden" name="status" value="<?php echo $formStatus ?>">
				<?php btnSubmit($formStatus) ?>
			</form>
 
			<?php
				if(isset($_POST['submit'])){

					if(isset($_POST['title']) && !empty($_POST['title']) &&
						isset($_POST['memo']) && !empty($_POST['memo']) &&
						isset($_POST['keyword']) && isset($_POST['description']))
					{
						if($_POST['status'] == "add"){
							$fileName = uploadImage($_FILES['image'], "post");

							if($fileName != false){
								$query = "
									INSERT INTO `post`(`title`, `memo`, `keyword`, `description`, `image`, `category_id`, `user_id`) 
									VALUES ('{$_POST['title']}','{$_POST['memo']}','{$_POST['keyword']}','{$_POST['description']}','$fileName','{$_POST['category']}','{$_SESSION['user_id']}')
								";
								if(!mysqli_query($con, $query))
									alert();
							}
						}
						else{
							if(mysqli_query($con, "UPDATE `category` SET `name`='{$_POST['name']}' WHERE `id`=".$_GET['id']))
								redirect();
							else
								alert();
						}
					}else{
						alert("فیلدها را پر کنید");
					}
				}
			?>
			<table>
				<thead>
					<tr>
						<th>نام</th>
						<th>عکس</th>
						<th>امکانات</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$select = mysqli_query($con, "SELECT `id`, `title`, `image` FROM `post`");
						$posts = mysqli_fetch_all($select, MYSQLI_ASSOC);

						

						foreach ($posts as $value) {
							$action = btnTable_action($value['id']);
							echo "
								<tr>
									<td>{$value['title']}</td>
									<td><img src=\"".url_post_image($value['image'])."\"></td>
									<td>$action</td>
								</tr>
							";
						}
					?>

				</tbody>
			</table>
		</main>
	</body>
</html>