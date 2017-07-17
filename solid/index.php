<?php 

	require "vendor/autoload.php";

	use Acme\Square;
	use Acme\Circle;
	use Acme\AreaCalculator;

	$squares = [new Square(10, 10), new Square(20, 20)];
	$circles = [new Circle(10), new Circle(20)];

	var_dump((new AreaCalculator())->calculate($circles));



 ?>