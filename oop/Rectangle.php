<?php
	class Rectangle extends Shape{
		
		private $isValidSize = true;

		public function __construct($width, $height)
		{
			if($width == $height)
				$this->isValidSize = false;

			parent::__construct($width, $height);
		}

		public function draw()
		{
			if($this->isValidSize){
				echo "
					<div 
						style='".$this->style()."' />
					</div>
				";
			}
			else{
				echo "This is a Square...";
			}
		}
	}
?>