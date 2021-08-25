<?php
	include("setting.php");

	function head($title = null, $baseUrl = "admin", $extra = null){
		if($title == null){
			$pathinfo = pathinfo($_SERVER['REQUEST_URI']);
			$title = ucfirst($pathinfo['filename']);
		}

		echo '
			<head>
				<meta charset="utf8">';

			if($baseUrl == "admin"){
				echo '
					<title>'.$title.' - Admin</title>
					<link rel="stylesheet" href="css/style.css">
					<script src="../js/jquery.min.js"></script>
					<script src="js/main.js"></script>
					'.$extra.'
				';
			} else{
				echo '
					<title>'.$title.' - Mag</title>
					<link rel="stylesheet" href="css/style.css">
					<link rel="stylesheet" href="css/icofont.min.css">
					'.$extra.'
				';
			}

		echo'
			</head>
		';
	}

	function alert($message="مشکل در عملیات", $status = "fail"){
		echo '
			<div class="alert '.$status.'" onclick="alertHide()">
				<div class="message">
					<span>'.$message.'</span>
				</div>
			</div>
		';
	}

	function redirect($url = null){
		if($url == null)
			$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
		exit("<script>document.location= '$url'</script>");
	}

	function isLogin(){
		return isset($_SESSION['user_id']);
	}

	function loginSuccess($user_id, $username){
		$_SESSION['user_id'] = $user_id;
		$_SESSION['username'] = $username;
		redirect("index.php");
	}

	function btnTable($href, $text, $extraClass = "red"){
		return '<a class="btn-table '.$extraClass.'" href="'.$href.'">'.$text.'</a>';
	}

	function btnTable_delete($id){
		return btnTable("?action=delete&id=$id", "حذف");
	}

	function btnTable_edit($id){
		return btnTable("?action=edit&id=$id", "ویرایش", null);
	}

	function btnTable_action($id){
		$result = btnTable_delete($id);
		$result .= btnTable_edit($id);

		return $result;
	}

	function btnSubmit($formStatus){
		echo '<button name="submit">'.($formStatus=="add"?"افزودن":"ویرایش").'</button>';
	}

	function uploadImage($fileArray, $extraDir = null, $required = true){	
		if($extraDir != null)
			$extraDir = $extraDir . "/";
			
		$target_dir = "../upload/$extraDir";
		
		$fileName = time() * rand(1, 100) . ".jpg";
		$target_file = $target_dir . $fileName ;

		$uploadError = null;

		if($required == true && $fileArray['size'] <= 0){
			$uploadError = "فیلد عکس اجباری است";
		}

		if($fileArray['type'] != "image/jpeg")
			$uploadError .= "فرمت مجاز فقط jpg <br>";

		if(($fileArray['size']/1024) >= 1000)
			$uploadError .= "حداکثر سایز 1 مگابایت <br>";
		


		if($uploadError == null){ 
			if(move_uploaded_file($fileArray['tmp_name'], $target_file))
				return $fileName;
			else
			{
				alert();
				return false;
			}
		}else{
			alert($uploadError);
			return false;
		}
	}

	function url_post_image($imageName){
		return absolute."upload/post/$imageName";
	}

	function url_user_image($imageName){
		if($imageName == 0)
			return absolute."image/user.jpg";
		else
			return absolute."upload/user/$imageName";
	}

	function url_category($id){
		return "category-show.php?id=$id";
	}

	function url_post($id){
		return "show-post.php?id=$id";
	}
?>