<?php
	function head($title = null){
		if($title == null){
			$pathinfo = pathinfo($_SERVER['REQUEST_URI']);
			$title = ucfirst($pathinfo['filename']);
		}
		echo '
			<head>
				<meta charset="utf8">
				<title>'.$title.' - Admin</title>
				<link rel="stylesheet" href="css/style.css">
				<script src="../js/jquery.min.js"></script>
				<script src="js/main.js"></script>
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
?>