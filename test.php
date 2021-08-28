<?php
	include "include/function.php";
	include "model/Table.php";
	include "model/Post.php";

	$post = new Post();

	$fields = [
		"memo"=>"ahvdsjasbdj",
		"date"=>1651615,
		"user_id"=>45,
		"category_id"=>645,
		"image"=>"jkansjkd.jpg",
	];

	$post->add($fields);

	exit;
?>