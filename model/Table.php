<?php
	include "./include/DB.php";

	class Table{
		private $db;
		private $tableName;

		private $error = [];

		function __construct()
		{
			$this->db = new DB();
			$this->tableName = strtolower(get_class($this));
		}

		/*
		public function update(){

		}

		public function get($id){

		}

		public function getAll($where){

		}

		public function join(){

		}

		public function reset(){
			
		}
		*/

		public function add($fields){

			$fields = $this->getParams($fields);

			if($fields == false)
			{
				var_dump($this->error);
				return false;
			}

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

		private function validation($value){
			return htmlentities($this->db-> con -> real_escape_string($value));
		}

		private function getParams($fields){
			$error = false;
			$raw_fields = get_object_vars($this);
			unset($raw_fields['db'], $raw_fields['tableName'],  $raw_fields['error']);

			foreach ($raw_fields as $raw_fields_key => $raw_fields_value) {
				if(!isset($raw_fields_value['default'])){

					if(isset($fields[$raw_fields_key]) && !empty($fields[$raw_fields_key] != null))
					{

						if($this->getParams_validation($fields[$raw_fields_key], $raw_fields_value))
							$raw_fields[$raw_fields_key] = $this->validation($fields[$raw_fields_key]);
						else{
							$error = true;
							$this->error[] = "$raw_fields_key is not ";
						}
					}
					else{
						$error = true;
						$this->error[] = "$raw_fields_key is required";
					}

				}
				else{
					if(isset($fields[$raw_fields_key]) && !empty($fields[$raw_fields_key])){
						if($this->getParams_validation($fields[$raw_fields_key], $raw_fields_value))
							$raw_fields[$raw_fields_key] = $this->validation($fields[$raw_fields_key]);
						else
							$error = true;
					}
					else
						$raw_fields[$raw_fields_key] = $raw_fields_value['default'];
				}
			}

			if($error)
				return false;

			return $raw_fields;

		}

		private function getParams_validation($fieldValue, $validationArray){
			$valid = true;
			switch ($validationArray['type']) {
				case 'i':
					if(!is_numeric($fieldValue))
						$valid = false;
					break;
				case 's':
					if(!is_string($fieldValue))
						$valid = false;
					break;
				case 'e':
					if(filter_var($fieldValue, FILTER_VALIDATE_EMAIL))
						$valid = false;
					break;
			}

			return $valid;
		}

		public function delete($id){
			echo "DELETE FROM `" . $this->tableName . "` WHERE `id`=".$id;
		}

	}
?>