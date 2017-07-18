<?php 

	namespace App;

	class PDFBook implements EbookInterface
	{
		public function read()
		{
			return "reading the pdf book";
		}
	}


 ?>