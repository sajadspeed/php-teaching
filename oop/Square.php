<?php
	class Square extends Shape{

		public function __construct($size)
		{
			parent::__construct($size, $size);
		}

		public function draw()
		{
			echo "
				<div 
					style='".$this->style()."' />
				</div>
			";
		}
	}
?>