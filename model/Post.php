<?php
	class Post extends Table{
		protected $title =   ["type"=>"s", "min"=> 5, "max"=> 200];
		protected $memo =  	 ["type"=>"s", "min"=> 50, "max"=> 1500];
		protected $keyword = ["type"=>"s", "min"=> 5, "max"=> 200, "default"=>""];
		protected $description = ["type"=>"s", "min"=> 5, "max"=> 200, "default"=>""];
		protected $image  = ["type"=>"s", "min"=> 5, "max"=> 255];
		protected $category_id = ["type"=>"i", "min"=> 1];
		protected $user_id  = ["type"=>"i", "min"=> 1];
		protected $date  = ["type"=>"i", "min"=> 1];
		protected $view  = ["type"=>"i", "min"=> 1, "default"=>0];
	}
?>
	