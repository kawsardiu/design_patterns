<?php 

	require "vendor/autoload.php";

	use App\App;
	use App\LogToXServer;

	(new App)->log("this is data", new LogToXServer);


 ?>