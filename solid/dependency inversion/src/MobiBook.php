<?php 

	namespace App;

	class MobiBook implements EbookInterface
	{
		public function read()
		{
			return "reading the mobi book";
		}
	}

 ?>