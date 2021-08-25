<?php
	class DB {
		public $con;

		function __construct(){
			$this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		}

		function execute($query){
			return $this->con->query($query);
		}

	}
?>