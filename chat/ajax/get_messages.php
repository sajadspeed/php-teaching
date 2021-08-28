<?php
	include "../lib/jalali.php";
    $con = new mysqli("localhost","root", "", "mag");
?>

<?php
    $messages = $con->query("SELECT * FROM `messages`")->fetch_all(MYSQLI_ASSOC);

	echo json_encode($messages);

	/*
    foreach ($messages as $message) {
        echo '
            <div class="message">
                <span>'.$message['name'].' | '.jdate("c", $message['date']).'</span>
                <p>'.$message['message'].'</p>
            </div>
        ';
    }
	*/
?>