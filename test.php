<?php
	include "include/function.php";
	include "model/Table.php";

	$table_category = new Table("category");

	$fields = [
		"name"=>"Programming",
	];

	$table_category->add($fields);

	///

	echo "<br><hr><br>";

	$table_category->delete(5);

	echo "<br><hr><br>";

	$table_post = new Table("post");

	$fields = [
		"title"=>"Hello World",
		"memo"=>"ahvdsjasbdj",
		"date"=>1651615
	];

	$table_post->add($fields);

	echo "<br><hr><br>";

	$table_post->delete(5);

	exit;
?>