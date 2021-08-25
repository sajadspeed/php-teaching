<?php
	include "../include/DB.php";

	class Table{
		private $db;
		private $tableName;

		function __construct($tableName)
		{
			$this->db = new DB();
			$this->tableName = $tableName;
		}

		public function add($fields){

			$columns = "";
			$values = "";

			foreach ($fields as $key => $field) {
				$columns .= "`$key`, ";
				$values .= "'$field', ";
			}

			$columns = rtrim($columns, ", ");
			$values = rtrim($values, ", ");

			$query = "INSERT INTO `" . $this->tableName . "` ($columns) VALUES($values)";

			echo $query;

			//return $this->db->execute($query);
		}

		public function delete($id){
			echo "DELETE FROM `" . $this->tableName . "` WHERE `id`=".$id;

		}

	}
?>