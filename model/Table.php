<?php
	include "../include/DB.php";

	class Table{
		private $db;
		private $tableName;

		function __construct()
		{
			$this->db = new DB();
			$this->tableName = strtolower(get_class($this));
		}

		public function add($fields){

			var_dump(get_object_vars($this));

			exit;

			$columns = "";
			$values = "";

			foreach ($fields as $key => $field) {
				$columns .= "`$key`, ";
				$values .= "'$field', ";
			}

			$columns = rtrim($columns, ", ");
			$values = rtrim($values, ", ");

			$query = "INSERT INTO `" . $this->tableName . "` ($columns) VALUES($values)";

			return $this->db->execute($query);
		}

		public function delete($id){
			echo "DELETE FROM `" . $this->tableName . "` WHERE `id`=".$id;
		}

	}
?>