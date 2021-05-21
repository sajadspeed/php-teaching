<?php
	session_start();
	include "../include/db.php";
	include "../include/function.php";

	if(!isLogin())
		redirect("login.php");

	$formStatus = "add";
	$field_name = null;

	if(isset($_GET['action']) && isset($_GET['id'])){
		if($_GET['action'] == "show" && isset($_GET['show'])){
			if(!mysqli_query($con, "UPDATE `category` SET `show`={$_GET['show']} WHERE `id`=".$_GET['id']))
				alert();
			else
				redirect();
		}
		else if($_GET['action'] == "delete"){
			if(!mysqli_query($con, "DELETE FROM `category` WHERE `id`=".$_GET['id']))
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
			<h1>دسته بندی</h1>

			<form action="" method="POST">
				<input type="text" placeholder="نام کتگوری" name="name" value="<?php echo $field_name ?>">
				<input type="hidden" name="status" value="<?php echo $formStatus ?>">
				<?php btnSubmit($formStatus) ?>
			</form>
 
			<?php
				if(isset($_POST['submit'])){
					if($_POST['status'] == "add"){
						if(!mysqli_query($con, "INSERT INTO `category`(`name`) VALUES ('{$_POST['name']}')"))
							alert();
					}
					else{
						if(mysqli_query($con, "UPDATE `category` SET `name`='{$_POST['name']}' WHERE `id`=".$_GET['id']))
							redirect();
						else
							alert();
					}
				}
			?>
			<table>
				<thead>
					<tr>
						<th>نام</th>
						<th>نمایش</th>
						<th>امکانات</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
						$select = mysqli_query($con, "SELECT * FROM `category`");
						$categories = mysqli_fetch_all($select, MYSQLI_ASSOC);

						foreach ($categories as $value) {
							if(($value['show'])==1)
								$btnShow = btnTable("?action=show&show=0&id={$value['id']}", "عدم نمایش");
							else
								$btnShow = btnTable("?action=show&show=1&id={$value['id']}", "نمایش", "green");

							$status = $value['show']==1?"فعال":"غیرفعال";

							echo "
								<tr>
									<td>{$value['name']}</td>
									<td>$status</td>
									<td>
										$btnShow
										".btnTable_action($value['id'])."
									</td>
								</tr>
							";
						}
					?>

				</tbody>
			</table>
		</main>
	</body>
</html>