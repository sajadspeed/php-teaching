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

	function alert($message, $status = "fail"){
		echo '
			<div class="alert '.$status.'" onclick="alertHide()">
				<div class="message">
					<span>'.$message.'</span>
				</div>
			</div>
		';
	}

	function redirect($url){
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
?>