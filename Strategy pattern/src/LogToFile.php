<?php 
	namespace App;

	class LogToFile implements Logger
	{
		public function log($data)
		{
			var_dump("Log to file");
		}
	}

 ?>