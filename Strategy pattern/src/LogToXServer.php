<?php 

	namespace App;

	class LogToXServer implements Logger
	{
		public function log($data)
		{
			var_dump("Log to saas server");
		}
	}
 ?>