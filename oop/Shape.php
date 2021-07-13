<?php
	class Shape{

		protected $width  = 0;
		protected $height = 0;

		private $backColor = "#dfdfdf";
		private $borderColor = "#444";
		private $typeOutline = "dashed";

		public function __construct($width, $height)
		{
			$this->width = $width;
			$this->height = $height;
		}

		public function draw()
		{
			echo "
				This is draw method
			";
		}

		protected function style(){
			return "width: ".$this->width."px; height: ".$this->height."px; border: 1px ".$this->typeOutline." ".$this->borderColor."; background: ".$this->backColor.";";
		}

		public function setStyle($backColor, $borderColor, $typeOutline){
			$this->backColor = $backColor;
			$this->borderColor = $borderColor;
			$this->typeOutline = $typeOutline;
		}


		public function __destruct(){
			echo "<br> This is __destruct method <br>";
		}

		public function test(){
			echo "<br> This is test <br>";
		}
	}
?>