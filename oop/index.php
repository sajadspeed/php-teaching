<?php
	/*
	include "Car.php";
	include "Circle.php";

	$car_1 = new Car(200);

	$car_1->color = "Green";
	$car_1->model = "Ford";

	$car_1->start();

	echo "<br>";

	$car_1->stop();

	echo "<br>";
	echo "<br>";

	$car_2 = new Car(170);

	$car_2->color = "Red";
	$car_2->model = "Toyota";

	$car_2->start();

	echo "<br>";

	$car_2->stop();
	

	echo "<br>";
	echo "<br>";

	$circle = new Circle(3);

	echo $circle->s();
	echo "<br>";
	echo $circle->p();
	*/

	include "Shape.php";
	include "Rectangle.php";
	include "Circle.php";
	include "Square.php";

	$rectangle = new Rectangle(300, 100);

	$rectangle->setStyle("#FFF", "green", "dashed");

	$rectangle->draw();

	echo "<br>";
	echo "<br>";

	$circle = new Circle(50);

	$circle->draw();

	echo "<br>";
	echo "<br>";

	$square = new Square(100);

	$square->draw();

?>