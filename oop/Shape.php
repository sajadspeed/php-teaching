<?php
	class Shape{

		public $width  = 0;
		public $height = 0;

		public $backColor = "#dfdfdf";
		public $borderColor = "#444";
		public $typeOutline = "dashed";

		public function __construct($width, $height)
		{
			$this->width = $width;
			$this->height = $height;
		}

		public function draw()
		{
			echo "Draw a unformed shape...";
		}

		public function style(){
			return "width: ".$this->width."px; height: ".$this->height."px; border: 1px ".$this->typeOutline." ".$this->borderColor."; background: ".$this->backColor.";";
		}

	}
?>