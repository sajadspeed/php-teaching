<?php
	$response = file_get_contents("http://www.omdbapi.com/?i=tt0816692&apikey=39567219");

	$response = json_decode($response, true);

	var_dump($response);
?>