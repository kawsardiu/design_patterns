<?php 

	require 'vendor/autoload.php';

	use App\Carrot;
	use App\Broccoli;
	use App\Garden;
	use App\Plot;
	use App\GardenOutputer;

	$garden = new Plot(['carrot' => new Carrot(5), 'broccoli' => new Broccoli(10)]);
	//$output = new GardenOutputer($garden);

	var_dump((new GardenOutputer($garden))->html());

 ?>