<?php 

	namespace App;

	class App
	{
		public function log ($data, Logger $logger = null)
		{
			$logger = $logger ?: new LogToDatabase;

			$logger->log($data);
		}
	}

 ?>