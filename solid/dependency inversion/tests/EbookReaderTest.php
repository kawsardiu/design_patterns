<?php 

	class EbookReaderTest extends PHPUnit_Framework_TestCase
	{
		/** @test */

		function itCanReadAPDFBook()
		{
			$b = new App\PDFBook();
			$r = new App\EbookReader($b);

			$this->assertRegExp('/pdf book/', $r->read());
		}

		/** @test */

		function itCanReadMobiBook()
		{
			$b = new App\MobiBook();
			$r = new App\EbookReader($b);

			$this->assertRegExp('/mobi book/', $r->read());
		}
	}

 ?>