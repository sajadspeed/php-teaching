<?php

	class Car{

		public $color = "Default Color";
		public $speed;
		public $model = "Default Model";

		public function __construct($speed){
			$this->speed = $speed;
		}

		public function start(){
			if($this->speed >= 180)
				echo "Car is not started...";
			else
				echo "Car width <strong>". $this->color ."</strong> color and <strong>". $this->speed ."</strong> and <strong>". $this->model ."</strong> model is started...";
		}

		public function stop(){
			echo "Car is stopped...";
		}

	}

?>