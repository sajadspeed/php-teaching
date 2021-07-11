<?php

	class Circle extends Shape{

		public function __construct($r)
		{
			parent::__construct($r * 2, $r * 2);
		}

		public function draw()
		{
			echo "
				<div 
					style='".$this->style()." border-radius: ".$this->width."px' />
				</div>
			";
		}
	}

	/*
	class Circle{

		public $r;

		public function __construct($r)
		{
			$this->r = $r;
		}

		public function s(){
			return $this->r * $this->r * pi();
		}

		public function p(){
			return $this->r * 2 * pi();
		}
		
	}
	*/

?>