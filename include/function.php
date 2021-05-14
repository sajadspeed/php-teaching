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
?>